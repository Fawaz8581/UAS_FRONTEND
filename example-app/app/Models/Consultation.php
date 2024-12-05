<?php

namespace App\Models;

use MongoDB\Client;

class Consultation
{
    protected static $client;

    // Fungsi untuk koneksi ke MongoDB
    public static function connect()
    {
        if (!self::$client) {
            // Koneksi ke MongoDB menggunakan URI dan nama database dari .env
            self::$client = new Client(env('MONGODB_URI', 'mongodb://127.0.0.1:27017'));
        }

        // Mengembalikan koleksi "consultations" dari database yang ditentukan
        return self::$client->selectCollection(env('MONGO_DB_DATABASE', 'UAS_FRONTEND'), 'consultations');
    }

    // Fungsi untuk membuat konsultasi baru
    public static function createConsultation(array $data)
    {
        $collection = self::connect();
        $result = $collection->insertOne($data);

        return $result->getInsertedId();
    }

    public static function getAllConsultations()
    {
        $collection = self::connect();
        $cursor = $collection->find();
        return iterator_to_array($cursor);
    }

    public static function updateConsultation($id, array $data)
    {
        try {
            $collection = self::connect();
            $objectId = new \MongoDB\BSON\ObjectId($id);
            
            return $collection->updateOne(
                ['_id' => $objectId],
                ['$set' => $data]
            );
        } catch (\Exception $e) {
            \Log::error('MongoDB update error: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function deleteConsultation($id)
    {
        $collection = self::connect();
        return $collection->deleteOne(
            ['_id' => new \MongoDB\BSON\ObjectId($id)]
        );
    }
} 