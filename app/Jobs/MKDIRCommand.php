<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MKDIRCommand implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $directory;
    protected int $permission;
    protected bool $recursive;

    /**
     * MKDIRCommand constructor.
     * @param string $directory
     * @param int $permission
     * @param bool $recursive
     */
    public function __construct(string $directory, int $permission, bool $recursive = false)
    {
        $this->directory = $directory;
        $this->permission = $permission;
        $this->recursive = $recursive;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        mkdir($this->directory, $this->permission, $this->recursive);
    }
}
