<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationPage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'location_pages';

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
    protected $fillable = ['title', 'description', 'banner', 'title_seo', 'description_seo'];

    
}
