<?php

namespace App\Models\v1;

use LaravelSimpleBases\Models\ModelBase;

/**
 * @property integer $id
 * @property integer $project_id
 * @property string $uuid
 * @property string $secret
 * @property boolean $enabled
 * @property string $branch
 * @property string $https
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Project $project
 * @property Command[] $commands
 */
class Repository extends ModelBase
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['project_id', 'uuid', 'secret', 'enabled', 'branch', 'https', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Models\v1\Project');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function commands()
    {
        return $this->belongsToMany(
            'App\Models\v1\Command',
            'repository_command'
        );
    }
}
