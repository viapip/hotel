<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageRoom extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home_page_rooms';

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
    protected $fillable = ['homepage_id', 'room_id'];

    
}
