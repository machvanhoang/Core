<?php

namespace App\Jobs;

use App\Mail\ImportEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class ImportCompleted implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        // $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('dinhcongthong97y@gmail.com')->send(new ImportEmail());
    }
}
