<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use Sluggable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rooms';

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
    protected $fillable = ['special_offer','title', 'preview_image', 'images', 'meters', 'description', 'price', 'link', 'title_seo', 'description_seo', 'slug'];


    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function others()
    {
        return $this->belongsToMany(Room::class, 'other_room', 'room_id', 'other_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Room::class, 'other_room', 'other_id', 'room_id');
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
