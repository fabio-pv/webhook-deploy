<?php

namespace App\Transformers\v1;

use App\Models\v1\Repository;
use League\Fractal\TransformerAbstract;

class RepositoryTransformer extends TransformerAbstract
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
     * @param Repository $repository
     * @return array
     */
    public function transform(Repository $repository)
    {
        return [

            'uuid' => $repository->uuid,
            'secret' => $repository->secret,
            'enabled' => $repository->enabled,
            'branch' => $repository->branch,
            'https' => $repository->https,
            'project' => fractal_transformer(
                $repository->project,
                ProjectTransformer::class,
                null
            ),
            'commands' => fractal_transformer(
                $repository->commands,
                CommandTransformer::class,
                null
            )
        ];
    }
}
