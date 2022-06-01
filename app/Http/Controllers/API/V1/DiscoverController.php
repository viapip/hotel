<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Discover;
use App\Models\DiscoverBlock;
use App\Models\HomePage;
use App\Models\LocationHome;

class DiscoverController extends Controller
{

    public function index()
    {
        $discover = DiscoverBlock::query()->firstOrFail();
        $discover->items = Discover::all();
        return $discover;
    }

    public function get($id)
    {
        $discover = Discover::query()->findOrFail($id);
        return $discover;
    }

}
