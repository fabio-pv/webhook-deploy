<?php

namespace App\Transformers\v1;

use App\Models\v1\Command;
use League\Fractal\TransformerAbstract;

class CommandTransformer extends TransformerAbstract
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
     * @param Command $command
     * @return array
     */
    public function transform(Command $command)
    {
        return [

            'uuid' => $command->uuid,
            'name' => $command->name,
            'commad' => $command->command,

        ];
    }
}
