<?php

namespace Tests\Unit\Jobs;

use App\Jobs\ProcessSendMailOrderToAdmin;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ProcessSendMailOrderToAdminTest extends TestCase
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

        $job = new ProcessSendMailOrderToAdmin($dataMessage);
        dispatch($job);

        Queue::assertPushed(ProcessSendMailOrderToAdmin::class);
    }
}
