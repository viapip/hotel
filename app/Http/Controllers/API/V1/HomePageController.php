<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\LocationHome;

class HomePageController extends Controller
{

    public function index()
    {
        $home = HomePage::query()->firstOrFail();
        $home->location = LocationHome::all();
        return $home;
    }

}
