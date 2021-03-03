<?php


namespace App\Utils;


use App\Jobs\ExecCommand;

class ExecCommandUtil
{
    private $dir;

    public function __construct(string $dir = null)
    {
        $this->dir = $dir;
    }

    public function exec(string $command): self
    {
        $moveDir = 'cd ' . $this->dir . ' && ';
        $command = $moveDir . $command;

        ExecCommand::dispatch($command);

        return $this;
    }

}
