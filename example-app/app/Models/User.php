<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Client;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected static $client;

    // Fungsi untuk koneksi ke MongoDB
    public static function connect()
    {
        if (!self::$client) {
            // Koneksi ke MongoDB menggunakan URI dan nama database dari .env
            self::$client = new Client(env('MONGODB_URI', 'mongodb://127.0.0.1:27017'));
        }

        // Mengembalikan koleksi "users" dari database "AuthController"
        return self::$client->selectCollection(env('MONGO_DB_DATABASE', 'UAS_FRONTEND'), 'users');
    }

    // Fungsi untuk membuat user baru
    public static function createUser(array $data)
    {
        // Enkripsi password sebelum disimpan
        $data['password'] = Hash::make($data['password']);
        
        $collection = self::connect();
        $result = $collection->insertOne($data);

        return $result->getInsertedId();
    }

    // Fungsi untuk mencari user berdasarkan email
    public static function findByEmail($email)
    {
        $collection = self::connect();
        return $collection->findOne(['email' => $email]);
    }
}
