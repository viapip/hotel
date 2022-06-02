<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Discover;
use App\Models\DiscoverBlock;
use App\Models\Gallery;
use App\Models\GalleryPage;
use App\Models\HomePage;
use App\Models\LocationHome;

class GalleryController extends Controller
{

    public function index()
    {
        $gallery = GalleryPage::query()->firstOrFail();
        $gallery->items = Gallery::all();
        return $gallery;
    }

}
