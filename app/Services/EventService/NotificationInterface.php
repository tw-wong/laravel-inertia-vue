<?php
namespace App\Services\EventService;

interface NotificationInterface
{
    public function send($user, $message);
}