<?php

namespace Hezbi\AbsensiPensPhp;

use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class MyPensFcmService
{
    private $messaging;

    public function __construct()
    {
        $firebase = (new Factory())
            ->withServiceAccount(__DIR__.'/mypens-firebase-credential.json');
        $this->messaging = $firebase->createMessaging();
    }

    public function pushNotification($nip)
    {
        $message = CloudMessage::withTarget('topic', "dosen_perizinan_absensi_$nip")
            ->withNotification(Notification::create(
                'Perizinan Absensi Baru',
                'Anda mendapatkan perizinan absensi baru!'
            ));

        try {
            $this->messaging->send($message);
            echo 'Berhasil send message';
        } catch (MessagingException $e) {
            echo "Ada Firebase Exception : {$e->getMessage()}";
        } catch (FirebaseException $e) {
            echo "Ada Firebase Exception : {$e->getMessage()}";
        }
    }
}
