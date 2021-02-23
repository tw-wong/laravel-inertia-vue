<?php
namespace App\Services\EventService;

class NotificationEmail implements NotificationInterface
{
    public function send($user, $message)
    {
        logger("Send {$message} to {$user->name} through Email.");
    }
}