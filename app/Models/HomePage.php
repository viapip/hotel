<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home_pages';

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
    protected $fillable = ['title', 'banner', 'about_title', 'about_subtitle', 'about_text', 'about_button', 'about_button_link', 'about_image', 'rooms_title', 'rooms_text', 'rooms_items', 'quality_title', 'quality_text', 'quality_button', 'quality_link', 'title_seo', 'description_seo'];


}
