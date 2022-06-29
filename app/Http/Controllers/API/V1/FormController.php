<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Admin\RoomsPageController;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormUserRequest;
use App\Mail\Form;
use App\Models\Discover;
use App\Models\Room;
use App\Models\RoomsPage;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{

    public function default(FormUserRequest $request)
    {
        return Mail::to(config('mail.to.address'))->send(new Form($request->all()));
    }


}
