<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\BookNow;

class BookNowController extends Controller
{

    public function index()
    {
        return BookNow::query()->firstOrFail();
    }

}
