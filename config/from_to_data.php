<?php

return [

    \App\Models\v1\Repository::class => [
        'project_uuid' => [
            'model' => \App\Models\v1\Project::class,
            'property' => 'project_id'
        ],
    ],

];
