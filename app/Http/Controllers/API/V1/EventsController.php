<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Admin\RoomsPageController;
use App\Http\Controllers\Controller;
use App\Models\Discover;
use App\Models\Event;
use App\Models\EventsBanner;
use App\Models\EventsPage;
use App\Models\Room;
use App\Models\RoomsPage;

class EventsController extends Controller
{

    public function index()
    {
        $events = EventsPage::query()->firstOrFail();
        $events->banner = EventsBanner::all();
        $events->events = Event::all();
        return $events;
    }

}
