<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscoverBlock extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discover_blocks';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['under_title', 'title'];

    
}
