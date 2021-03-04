<?php


namespace App\Services\v1;


use App\Models\v1\Repository;
use App\Modules\v1\CloneModule;
use App\Modules\v1\EnvModule;
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

    public function clone(string $uuid): Repository
    {
        try {
            /**
             * @var Repository $repositoryModel
             */
            $repositoryModel = Repository::findByUuid($uuid, true);
            $cloneModule = new CloneModule($repositoryModel);
            $cloneModule->start();

            return $repositoryModel;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function retrieveEnv(string $uuid): array
    {
        try {
            /**
             * @var Repository $repositoryModel
             */
            $repositoryModel = Repository::findByUuid($uuid, true);
            $getEnvModule = new EnvModule($repositoryModel);
            return $getEnvModule->startGet();

        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createEnv(string $uuid): Repository
    {
        try {
            /**
             * @var Repository $repositoryModel
             */
            $repositoryModel = Repository::findByUuid($uuid, true);
            $getEnvModule = new EnvModule($repositoryModel);
            $getEnvModule->startCreate();

            return $repositoryModel;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createCommand(string $uuid): Repository
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
}
