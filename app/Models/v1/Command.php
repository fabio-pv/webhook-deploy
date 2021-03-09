<?php

namespace App\Models\v1;

use LaravelSimpleBases\Models\ModelBase;

/**
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property string $command
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $position
 * @property Repository[] $repositories
 */
class Command extends ModelBase
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
    protected $fillable = ['uuid', 'name', 'command', 'created_at', 'updated_at', 'deleted_at', 'position'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function repositories()
    {
        return $this->belongsToMany('App\Models\v1\Repository', 'repository_command');
    }
}
