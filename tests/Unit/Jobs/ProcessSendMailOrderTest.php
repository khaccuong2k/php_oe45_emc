<?php

namespace Tests\Unit\Jobs;

use App\Jobs\ProcessSendMailOrder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ProcessSendMailOrderTest extends TestCase
{
    use Dispatchable;

    public function testDispachesProcessSendMailOrderToAdminJob()
    {
        Queue::fake();

        $dataMessage = [
            'email' => 'khaccuongg@gmail.com',
            'user' => 'khaccuong',
            'statusOfOrder' => 'Change To Order',
        ];

        $job = new ProcessSendMailOrder($dataMessage);
        dispatch($job);

        Queue::assertPushed(ProcessSendMailOrder::class);
    }
}
