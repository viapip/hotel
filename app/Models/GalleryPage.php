<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryPage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_pages';

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
    protected $fillable = ['title', 'image', 'title_seo', 'description_seo'];

    
}
