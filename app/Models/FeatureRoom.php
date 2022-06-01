<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureRoom extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feature_room';

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
    protected $fillable = ['feature_id', 'room_id'];


}
