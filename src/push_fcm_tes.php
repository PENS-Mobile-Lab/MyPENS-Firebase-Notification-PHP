<?php

use Hezbi\AbsensiPensPhp\MyPensFcmService;

require __DIR__ . '/../vendor/autoload.php';

$fcmService = new MyPensFcmService();

// Mengpush notification ke user dengan NIP 90776
$fcmService->pushNotification('90776');

echo 'sukses mengirim pesan!';