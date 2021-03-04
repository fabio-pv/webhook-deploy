<?php

namespace App\Http\Controllers\v1;

use App\Http\Validations\v1\CommandValidation;
use App\Models\v1\Command;
use App\Services\v1\CommandService;
use App\Transformers\v1\CommandTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use LaravelSimpleBases\Exceptions\MethodNotAllowException;
use LaravelSimpleBases\Http\Controllers\BaseController;

class CommandController extends BaseController
{
    public function __construct(
        Command $command,
        CommandTransformer $commandTransformer,
        CommandValidation $commandValidation
    )
    {
        $this->model = $command;
        $this->service = new CommandService($this->model);
        $this->transformer = $commandTransformer;
        $this->validation = $commandValidation;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     * @throws MethodNotAllowException
     */
    public function store(Request $request): JsonResponse
    {
        throw new MethodNotAllowException();
    }

    /**
     * @param $uuid
     * @return \Illuminate\Http\JsonResponse|void
     * @throws MethodNotAllowException
     */
    public function destroy($uuid): JsonResponse
    {
        throw new MethodNotAllowException();
    }

}
