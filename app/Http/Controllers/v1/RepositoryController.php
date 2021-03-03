<?php

namespace App\Http\Controllers\v1;

use App\Http\Validations\v1\RepositoryValidation;
use App\Models\v1\Repository;
use App\Services\v1\RepositoryService;
use App\Transformers\v1\RepositoryTransformer;
use LaravelSimpleBases\Http\Controllers\BaseController;

class RepositoryController extends BaseController
{
    public function __construct(
        Repository $repository,
        RepositoryTransformer $repositoryTransformer,
        RepositoryValidation $repositoryValidation
    )
    {
        $this->model = $repository;
        $this->service = new RepositoryService($this->model);
        $this->transformer = $repositoryTransformer;
        $this->validation = $repositoryValidation;
    }
}
