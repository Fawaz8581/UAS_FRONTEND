<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Consultation;

class UserController extends Controller
{
    // Metode untuk menghapus akun
    public function deleteAccount(Request $request)
    {
        $user = $request->session()->get('user');

        if (!$user) {
            return back()->withErrors(['delete_error' => 'User not found.']);
        }

        // Hapus user dari database menggunakan email
        $collection = User::connect();
        $deleteResult = $collection->deleteOne(['email' => $user['email']]);

        if ($deleteResult->getDeletedCount() > 0) {
            // Hapus user dari session
            $request->session()->forget('user');
            return redirect('/')->with('success', 'Account deleted successfully.');
        }

        return back()->withErrors(['delete_error' => 'Failed to delete account.']);
    }

    public function changePassword(Request $request)
    {
        // Check if user exists in session
        $user = $request->session()->get('user');
        if (!$user) {
            return redirect('/')->withErrors(['auth_error' => 'You must be logged in to change your password.']);
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Get user from MongoDB
        $collection = User::connect();
        $currentUser = $collection->findOne(['email' => $user['email']]);

        if (!$currentUser) {
            return back()->withErrors(['user_error' => 'User not found in database.']);
        }

        if (!Hash::check($request->current_password, $currentUser['password'])) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Hash the new password
        $hashedPassword = Hash::make($request->new_password);

        // Update password and password_plain in MongoDB using ObjectId
        $updateResult = $collection->updateOne(
            ['_id' => $currentUser['_id']], // Menggunakan ID dokumen
            [
                '$set' => [
                    'password' => $hashedPassword,
                    'password_plain' => $request->new_password
                ]
            ]
        );

        if ($updateResult->getModifiedCount() > 0) {
            return back()->with('success', 'Password changed successfully');
        } else {
            return back()->withErrors(['update_error' => 'Failed to update password.']);
        }
    }

    public function changeUsername(Request $request)
    {
        // Check if user exists in session
        $user = $request->session()->get('user');
        if (!$user) {
            return redirect('/')->withErrors(['auth_error' => 'You must be logged in to change your username.']);
        }

        $request->validate([
            'new_username' => 'required|min:3|max:50',
        ]);

        // Get user from MongoDB
        $collection = User::connect();
        $currentUser = $collection->findOne(['email' => $user['email']]);

        if (!$currentUser) {
            return back()->withErrors(['user_error' => 'User not found in database.']);
        }

        // Check if new username already exists
        $usernameExists = $collection->findOne(['username' => $request->new_username]);
        if ($usernameExists) {
            return back()->withErrors(['new_username' => 'This username is already taken']);
        }

        // Update username in MongoDB using ObjectId
        $updateResult = $collection->updateOne(
            ['_id' => $currentUser['_id']], 
            [
                '$set' => [
                    'username' => $request->new_username
                ]
            ]
        );

        if ($updateResult->getModifiedCount() > 0) {
            // Update session with new username
            $user['username'] = $request->new_username;
            $request->session()->put('user', $user);

            // Update username in all related consultations using MongoDB syntax
            $consultationCollection = Consultation::connect();
            $consultationCollection->updateMany(
                ['user_id' => $currentUser['_id']],
                [
                    '$set' => [
                        'username' => $request->new_username
                    ]
                ]
            );

            return back()->with('success', 'Username changed successfully');
        } else {
            return back()->withErrors(['update_error' => 'Failed to update username.']);
        }
    }

    public function changeEmail(Request $request)
{
    // Check if user exists in session
    $user = $request->session()->get('user');
    if (!$user) {
        return redirect('/')->withErrors(['auth_error' => 'You must be logged in to change your email.']);
    }

    $request->validate([
        'new_email' => 'required|email|max:255',
        'password' => 'required',
    ]);

    // Get user from MongoDB
    $collection = User::connect();
    $currentUser = $collection->findOne(['email' => $user['email']]);

    if (!$currentUser) {
        return back()->withErrors(['user_error' => 'User not found in database.']);
    }

    // Verify password
    if (!Hash::check($request->password, $currentUser['password'])) {
        return back()->withErrors(['password' => 'Password is incorrect']);
    }

    // Check if new email already exists
    $emailExists = $collection->findOne(['email' => $request->new_email]);
    if ($emailExists) {
        return back()->withErrors(['new_email' => 'This email is already in use']);
    }

    // Update email in MongoDB using ObjectId
    $updateResult = $collection->updateOne(
        ['_id' => $currentUser['_id']], // Menggunakan ID dokumen
        [
            '$set' => [
                'email' => $request->new_email
            ]
        ]
    );

    if ($updateResult->getModifiedCount() > 0) {
        // Update session with new email
        $user['email'] = $request->new_email;
        $request->session()->put('user', $user);
        
        return back()->with('success', 'Email changed successfully');
    } else {
        return back()->withErrors(['update_error' => 'Failed to update email.']);
    }
}

public function changeProfileImage(Request $request)
{
    // Check if user exists in session
    $user = $request->session()->get('user');
    if (!$user) {
        return redirect('/')->withErrors(['auth_error' => 'You must be logged in to change your profile image.']);
    }

    $request->validate([
        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:800'
    ]);

    try {
        // Get user from MongoDB
        $collection = User::connect();
        $currentUser = $collection->findOne(['email' => $user['email']]);

        if (!$currentUser) {
            return back()->withErrors(['user_error' => 'User not found in database.']);
        }

        // Handle file upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Move the uploaded file to public storage
            $image->move(public_path('profile_images'), $imageName);
            
            // Create the public URL for the image
            $imageUrl = url('profile_images/' . $imageName);

            // Remove old profile image if exists
            if (isset($currentUser['profile_image'])) {
                $oldImagePath = public_path(str_replace(url('/'), '', parse_url($currentUser['profile_image'], PHP_URL_PATH)));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update profile_image in MongoDB
            $updateResult = $collection->updateOne(
                ['_id' => $currentUser['_id']],
                [
                    '$set' => [
                        'profile_image' => $imageUrl
                    ]
                ]
            );

            if ($updateResult->getModifiedCount() > 0) {
                // Update session with new profile image
                $user['profile_image'] = $imageUrl;
                $request->session()->put('user', $user);
                
                return back()->with('success', 'Profile image updated successfully');
            }
        }

        return back()->withErrors(['update_error' => 'Failed to update profile image.']);

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred while updating profile image.']);
    }
}

public function removeProfileImage(Request $request)
{
    // Check if user exists in session
    $user = $request->session()->get('user');
    if (!$user) {
        return redirect('/')->withErrors(['auth_error' => 'You must be logged in to remove your profile image.']);
    }

    try {
        // Get user from MongoDB
        $collection = User::connect();
        $currentUser = $collection->findOne(['email' => $user['email']]);

        if (!$currentUser) {
            return back()->withErrors(['user_error' => 'User not found in database.']);
        }

        // Remove old profile image if exists
        if (isset($currentUser['profile_image'])) {
            $oldImagePath = public_path(str_replace(url('/'), '', parse_url($currentUser['profile_image'], PHP_URL_PATH)));
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Update MongoDB to remove profile_image
        $updateResult = $collection->updateOne(
            ['_id' => $currentUser['_id']],
            [
                '$unset' => [
                    'profile_image' => ""
                ]
            ]
        );

        if ($updateResult->getModifiedCount() > 0) {
            // Remove profile_image from session
            unset($user['profile_image']);
            $request->session()->put('user', $user);
            
            return back()->with('success', 'Profile image removed successfully');
        }

        return back()->withErrors(['update_error' => 'Failed to remove profile image.']);

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred while removing profile image.']);
    }
}
}
