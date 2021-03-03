<?php


namespace App\Modules\v1;


use App\Models\v1\Repository;
use App\Utils\CommandUtil;
use App\Utils\ExecCommandUtil;

class CloneModule
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function start(): void
    {
        $this->doCreateDir();
        $this->doClone();
    }

    private function doCreateDir(): void
    {
        if (is_dir(($this->repository->project->directory))) {
            return;
        }

        mkdir($this->repository->project->directory, 0755);
    }

    private function doClone(): void
    {
        $execCommandUtil = new ExecCommandUtil($this->repository->project->directory);
        $execCommandUtil->exec(
            CommandUtil::clone($this->repository->https)
        );
    }
}
