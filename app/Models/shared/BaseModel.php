<?php

namespace App\Models\shared;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class BaseModel extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @throws \Exception
     */
    public function service()
    {
        $class_name = str_replace('Models', 'Services', static::class).'Service';

        if (! class_exists($class_name)) {
            throw new \Exception('Classname not found.');
        }

        return new $class_name($this);
    }

    /**
     * @throws \Exception
     */
    public function repository()
    {
        $class_name = str_replace('Models', 'Repositories', static::class).'Repository';

        if (! class_exists($class_name)) {
            throw new \Exception('Classname not found.');
        }

        return new $class_name($this);
    }
}
