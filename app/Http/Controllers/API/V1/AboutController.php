<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Admin\RoomsPageController;
use App\Http\Controllers\Controller;
use App\Models\AboutBanner;
use App\Models\AboutPage;
use App\Models\Discover;
use App\Models\Event;
use App\Models\EventsBanner;
use App\Models\EventsPage;
use App\Models\Room;
use App\Models\RoomsPage;

class AboutController extends Controller
{

    public function index()
    {
        $about = AboutPage::query()->firstOrFail();
        $about->banner = AboutBanner::all();
        return $about;
    }

}
