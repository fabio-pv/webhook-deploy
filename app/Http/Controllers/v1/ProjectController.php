<?php

namespace App\Http\Controllers\v1;

use App\Http\Validations\v1\ProjectValidation;
use App\Models\v1\Project;
use App\Services\v1\ProjectService;
use App\Transformers\v1\ProjectTransformer;
use LaravelSimpleBases\Http\Controllers\BaseController;

class ProjectController extends BaseController
{
    public function __construct(
        Project $project,
        ProjectTransformer $projectTransformer,
        ProjectValidation $projectValidation
    )
    {
        $this->model = $project;
        $this->service = new ProjectService($this->model);
        $this->transformer = $projectTransformer;
        $this->validation = $projectValidation;
    }
}
