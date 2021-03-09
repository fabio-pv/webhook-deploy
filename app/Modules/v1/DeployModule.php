<?php


namespace App\Modules\v1;


use App\Models\v1\Repository;
use App\Services\v1\RepositoryService;
use LaravelSimpleBases\Exceptions\ValidationException;

class DeployModule
{
    private Repository $repository;
    private RepositoryService $repositoryService;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
        $this->repositoryService = new RepositoryService($this->repository);
    }

    public function start()
    {
        $this->verifyEnableDeploy();
        $this->verifyBranch();
        $this->executeCommands();
    }

    private function verifyEnableDeploy()
    {
        if ($this->repository->enabled !== 1) {
            throw new ValidationException('Auto Deploy disabled');
        }
    }

    private function verifyBranch()
    {
        $branch = str_replace(
            'refs/heads/',
            '',
            request()->get('ref')
        );

        if ($branch !== $this->repository->branch) {
            throw new ValidationException('Wrong Branch');
        }
    }

    private function executeCommands()
    {
        $this->repositoryService->executeCommands();
    }
}
