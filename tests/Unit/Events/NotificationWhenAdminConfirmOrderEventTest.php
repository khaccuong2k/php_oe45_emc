<?php

namespace Tests\Unit\Events;

use App\Events\NotificationWhenAdminConfirmOrderEvent;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class NotificationWhenAdminConfirmOrderEventTest extends TestCase
{
    public function testDispatchEventNotificationToUser()
    {
        Event::fake();

        $dataMessage = [
            'email' => 'khaccuongg@gmail.com',
            'user' => 'khaccuong',
            'statusOfOrder' => 'Change To Order',
        ];

        event(new NotificationWhenAdminConfirmOrderEvent($dataMessage));

        Event::assertDispatched(NotificationWhenAdminConfirmOrderEvent::class);
    }
}
