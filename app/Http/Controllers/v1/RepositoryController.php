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
     * @return JsonResponse
     * @throws \Exception
     */
    public function doClone(Request $request): JsonResponse
    {
        try {

            $this->hasPermissonSet();
            $this->validation->validate($request, __FUNCTION__);
            $this->retrive = $this->service->clone();

            $response = fractal($this->retrive, $this->transformer);

        } catch (\Exception $e) {
            throw $e;
        }

        return response_default($response, StatusCodeUtil::CREATED);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function getEnv(Request $request): JsonResponse
    {
        try {

            $this->hasPermissonSet();
            $this->validation->validate($request, __FUNCTION__);
            $this->retrive['data']['env'] = $this->service->retrieveEnv();

        } catch (\Exception $e) {
            throw $e;
        }

        return response_default($this->retrive, StatusCodeUtil::CREATED);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function doCreateEnv(Request $request): JsonResponse
    {
        try {

            $this->hasPermissonSet();
            $this->validation->validate($request, __FUNCTION__);
            $this->retrive = $this->service->createEnv();

            $response = fractal($this->retrive, $this->transformer);

        } catch (\Exception $e) {
            throw $e;
        }

        return response_default($response, StatusCodeUtil::CREATED);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function doCreateCommand(Request $request): JsonResponse
    {
        try {

            $this->hasPermissonSet();
            $this->validation->validate($request, __FUNCTION__);
            $this->retrive = $this->service->createCommand();

            $response = fractal($this->retrive, $this->transformer);

        } catch (\Exception $e) {
            throw $e;
        }

        return response_default($response, StatusCodeUtil::CREATED);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function doExecuteCommands(Request $request): JsonResponse
    {
        try {

            $this->hasPermissonSet();
            $this->validation->validate($request, __FUNCTION__);
            $this->retrive = $this->service->executeCommands();

            $response = fractal($this->retrive, $this->transformer);

        } catch (\Exception $e) {
            throw $e;
        }

        return response_default($response, StatusCodeUtil::CREATED);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function doStartDeploy(Request $request) : JsonResponse
    {
        try {

            $this->hasPermissonSet();
            $this->validation->validate($request, __FUNCTION__);
            $this->retrive = $this->service->startDeploy();

            $response = fractal($this->retrive, $this->transformer);

            return response_default($response, StatusCodeUtil::CREATED);

        } catch (\Exception $e) {
            throw $e;
        }
    }
}
