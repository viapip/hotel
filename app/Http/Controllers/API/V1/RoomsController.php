<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Admin\RoomsPageController;
use App\Http\Controllers\Controller;
use App\Models\Discover;
use App\Models\Room;
use App\Models\RoomsPage;

class RoomsController extends Controller
{

    public function index()
    {
        $rooms = RoomsPage::query()->firstOrFail();
        $rooms->items = Room::with('features')->get();
        return $rooms;
    }

    public function get($slug)
    {
        $room = Room::query()->where('slug', $slug)
            ->with('features')
            ->with(['others' => function($query){
                $query->with('features');
            }])
            ->get();
        if ($room->isEmpty()){
            return response()->json(['code' => 404, 'message' => 'Not found!'], 404);
        }
        return $room;
    }

    public function special()
    {
        $room = Room::query()->select('slug')->where('special_offer', 1)
            ->first();
        if (!$room){
            return response()->json(['code' => 404, 'message' => 'Not found!'], 404);
        }
        return $room;
    }

}
