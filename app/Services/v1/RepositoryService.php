<?php


namespace App\Services\v1;


use App\Models\v1\Repository;
use App\Modules\v1\CloneModule;
use App\Modules\v1\EnvModule;
use LaravelSimpleBases\Services\BaseService;

class RepositoryService extends BaseService
{
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

    public function retrieveEnv(string $uuid): Repository
    {
        try {
            /**
             * @var Repository $repositoryModel
             */
            $repositoryModel = Repository::findByUuid($uuid, true);
            $getEnvModule = new EnvModule($repositoryModel);
            $getEnvModule->startGet();

            return $repositoryModel;

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
}
