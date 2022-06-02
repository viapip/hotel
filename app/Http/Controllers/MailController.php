<?php

namespace App\Http\Controllers;

use App\Mail\Form;
use App\Mail\Order;
use App\Mail\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    private $MAIL_ADMIN = null;
    public function __construct()
    {
        $this->MAIL_ADMIN = config('mail.mailers.smtp.username');
    }

    public function form(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
        ]);
        Mail::to($this->MAIL_ADMIN)->send(new Form($request->all()));

        return true;

    }

    public function order(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'size' => 'required',
            'product' => 'required',
        ]);
        Mail::to($this->MAIL_ADMIN)->send(new Order($request->all()));

        return true;
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
        ]);
        Mail::to($this->MAIL_ADMIN)->send(new Subscribe($request->all()));
        return true;
    }
}
