<?php


namespace App\Modules\v1;


use App\Jobs\ExecCommand;
use App\Models\v1\Command;
use App\Models\v1\Repository;
use App\Utils\CommandUtil;

class ExecuteCommandModule
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function start()
    {
        $this->executeSequence();
    }

    private function executeSequence(): void
    {
        foreach ($this->repository->commands as $command) {
            $this->execute($command);
        }
    }

    private function execute(Command $command): void
    {
        $command = CommandUtil::command($this->repository, $command);

        ExecCommand::dispatch($command);
    }
}
