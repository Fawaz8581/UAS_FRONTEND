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
            self::$client = new Client(env('MONGODB_URI', 'mongodb://127.0.0.1:27017'));
        }

        return self::$client->selectCollection(env('MONGO_DB_DATABASE', 'UAS_FRONTEND'), 'users');
    }

    // Fungsi untuk membuat user baru
    public static function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);  // Enkripsi password sebelum disimpan
        $collection = self::connect();
        $result = $collection->insertOne($data);

        return $result->getInsertedId();
    }
}
