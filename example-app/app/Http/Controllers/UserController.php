<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
}
