<?php

/**
 * File ini digunakan untuk memberi contoh cara menggunakan class MyPENSFcmService
 */

use Hezbi\AbsensiPensPhp\MyPensFcmService;

// menload semua package composer
require __DIR__ . '/../vendor/autoload.php';

$fcmService = new MyPensFcmService();

// Mengpush notification ke dosen dengan NIP 90776
// Judul notifikasinya adalah 'Perizinan Absensi Baru'
// Body dari notifikasinya adalah 'Anda mendapatkan perizinan absensi baru!
$fcmService->pushNotificationToDosen(
    '90776', 'Perizinan Absensi Baru', 'Anda mendapatkan perizinan absensi baru!'
);

echo 'sukses mengirim pesan!';