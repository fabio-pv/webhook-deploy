<?php

namespace App\Transformers\v1;

use App\Models\v1\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * @param Project $project
     * @return array
     */
    public function transform(Project $project)
    {
        return [

            'uuid' => $project->uuid,
            'name' => $project->name,
            'directory' => $project->directory,

        ];
    }
}
