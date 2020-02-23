<?php

namespace App\Console\Commands;

use Amqp;
use App\Service\Jobs\JobProcessService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class JobProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:convert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $jobProcessService;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(JobProcessService $jobProcessService)
    {
        $this->jobProcessService = $jobProcessService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Amqp::consume('queue-name', function ($message, $resolver) {
            $this->jobProcessService->convertJob($message->body);
            $resolver->acknowledge($message);
        }, [
            'vhost' => 'samacom',
            'exchange' => 'message_samacom',
            'persistent' => true
        ]);
    }
}
