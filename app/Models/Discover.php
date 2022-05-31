<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discover extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'discovers';

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
    protected $fillable = ['title', 'image', 'description', 'from', 'latitude_a', 'longitude_a', 'latitude_b', 'longitude_b', 'title_seo', 'description_seo'];

    
}
