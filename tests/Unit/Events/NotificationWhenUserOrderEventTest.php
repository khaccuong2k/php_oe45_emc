<?php

namespace Tests\Unit\Events;

use App\Events\NotificationWhenUserOrderEvent;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class NotificationWhenUserOrderEventTest extends TestCase
{
    public function testDispatchEventNotificationToUser()
    {
        Event::fake();

        $dataMessage = [
            'order_id' => 2,
            'email' => "khac.uong2k@gmail.com",
            'avatar' => 'default.png',
            'user' => 'khac cuong',
            'quantity' => 2
        ];

        event(new NotificationWhenUserOrderEvent($dataMessage));

        Event::assertDispatched(NotificationWhenUserOrderEvent::class);
    }
}
