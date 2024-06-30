<?php

/**
 * File ini digunakan untuk memberi contoh cara menggunakan class MyPENSFcmService
 */

use Hezbi\AbsensiPensPhp\MyPensFcmService;

// menload semua package composer
require __DIR__ . '/../vendor/autoload.php';

$fcmService = new MyPensFcmService();

// Mengpush notification ke dosen dengan NIP 90776
$fcmService->pushNotificationToDosen('90776');

echo 'sukses mengirim pesan!';