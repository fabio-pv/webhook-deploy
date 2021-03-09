<?php


namespace App\Services\v1;


use App\Models\v1\Repository;
use App\Modules\v1\CloneModule;
use App\Modules\v1\DeployModule;
use App\Modules\v1\EnvModule;
use App\Modules\v1\ExecuteCommandModule;
use LaravelSimpleBases\Services\BaseService;

/**
 * Class RepositoryService
 * @package App\Services\v1
 *
 * @property Repository $model
 */
class RepositoryService extends BaseService
{
    public function __construct($model)
    {
        parent::__construct($model);

        if (!empty(request()->uuid)) {
            $this->model = Repository::findByUuid(request()->uuid, true);
        }
    }

    /**
     * @return Repository
     * @throws \Exception
     */
    public function clone(): Repository
    {
        try {
            $cloneModule = new CloneModule($this->model);
            $cloneModule->start();

            return $this->model;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function retrieveEnv(): array
    {
        try {
            $getEnvModule = new EnvModule($this->model);
            return $getEnvModule->startGet();

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return Repository
     * @throws \Exception
     */
    public function createEnv(): Repository
    {
        try {
            $getEnvModule = new EnvModule($this->model);
            $getEnvModule->startCreate();

            return $this->model;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return Repository
     * @throws \Exception
     */
    public function createCommand(): Repository
    {
        try {

            $data = request()->all();

            $this->model
                ->commands()
                ->create($data);

            return $this->model;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return Repository
     * @throws \Exception
     */
    public function executeCommands(): Repository
    {
        try {

            $executeCommandModule = new ExecuteCommandModule($this->model);
            $executeCommandModule->start();

            return $this->model;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @return Repository
     * @throws \Exception
     */
    public function startDeploy(): Repository
    {
        try {

            $deployModule = new DeployModule($this->model);
            $deployModule->start();

            return $this->model;

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
