<?php


namespace App\Services\v1;


use App\Models\v1\Repository;
use App\Modules\v1\CloneModule;
use LaravelSimpleBases\Services\BaseService;

class RepositoryService extends BaseService
{

    public function clone(array $data, string $uuid)
    {
        /**
         * @var Repository $repositoryModel
         */
        $repositoryModel = Repository::findByUuid($uuid, true);
        $cloneModule = new CloneModule($repositoryModel);
        $cloneModule->start();
    }
}
