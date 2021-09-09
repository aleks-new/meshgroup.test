<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessExcel implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $uniqueId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($uniqueId) {
        $this->uniqueId = $uniqueId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        \Log::debug("dispatch excel: " . $this->uniqueId);
    }
}
