<?php

namespace Hezbi\AbsensiPensPhp;

use Kreait\Firebase\Exception\FirebaseException;
use Kreait\Firebase\Exception\MessagingException;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

/**
 * MyPENS Firebase Cloud Messaging Service - Class yang berfungsi untuk mengirimkan notification kepada user MyPENS
 */
class MyPensFcmService
{
    private $messaging;

    public function __construct()
    {
        $firebase = (new Factory())
            ->withServiceAccount(__DIR__.'/mypens-firebase-credential.json');
        $this->messaging = $firebase->createMessaging();
    }

    /**
     * Kirim notification kepada dosen berdasarkan NIP
     * @param string $nip NIP dari dosen
     * @return void
     */
    public function pushNotificationToDosen(string $nip, string $title, string $body)
    {
        $message = CloudMessage::withTarget('topic', "dosen_perizinan_absensi_$nip")
            ->withNotification(Notification::create($title, $body));

        try {
            $this->messaging->send($message);
        } catch (MessagingException $e) {
            echo "Ada Firebase Exception : {$e->getMessage()}";
        } catch (FirebaseException $e) {
            echo "Ada Firebase Exception : {$e->getMessage()}";
        }
    }
}
