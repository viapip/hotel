<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormUserRequest;
use App\Mail\Form;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{

    public function default(FormUserRequest $request)
    {
        return Mail::to(config('email.to.address'))->send(new Form($request->all()));
    }


}
