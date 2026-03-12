<?php

use App\Models\Log;

if (!function_exists('logActivity')) {
    /**
     * Simpan log aktivitas user
     *
     * @param string $keterangan
     * @return void
     */
    function logActivity(string $keterangan)
    {
        $user = auth()->user();
        $nama = $user ? $user->nama : 'Guest';

        Log::create([
            'keterangan' => "User {$nama} " . $keterangan,
        ]);
    }
}