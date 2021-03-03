<?php

namespace App\Http\Controllers\v1;

use App\Http\Validations\v1\RepositoryValidation;
use App\Models\v1\Repository;
use App\Services\v1\RepositoryService;
use App\Transformers\v1\RepositoryTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use LaravelSimpleBases\Http\Controllers\BaseController;
use LaravelSimpleBases\Utils\StatusCodeUtil;

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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function doClone(Request $request, string $uuid): JsonResponse
    {
        try {

            $this->hasPermissonSet();
            $this->validation->validate($request, __FUNCTION__);
            $data = $request->all();
            $this->retrive = $this->service->clone($data, $uuid);

            $response = fractal($this->retrive, $this->transformer);

        } catch (\Exception $e) {
            throw $e;
        }

        return response_default($response, StatusCodeUtil::CREATED);

    }

}