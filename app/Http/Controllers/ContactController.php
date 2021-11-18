<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactSendmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ValiRequest;
use App\Http\Requests\ApiValidationRequest;
use Illuminate\Http\Request;
use App\Service\WritingService;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\Middleware\ShareErrorsFromSession;


class ContactController extends Controller
{

    protected $writingservice;

    public function __construct()
    {
        $this->writingservice = new WritingService();
    }

    public function index()
    {
        return view('contact.index');
    }

    public function getreact(ApiValidationRequest $request)
    {

    }

    public function mailsend(Request $request)
    {
        $inputs = $request->all();

        Mail::to($inputs['email'])->send(new ContactSendmail($inputs));

        return response()->json([
            $inputs,
            "hello"
        ]);
    }


    public function confirm(ValiRequest $request)
    {
        $inputs = $request->all();

        return view('contact.confirm', [
            'inputs' => $inputs,
        ]);
    }

    public function thanks() {
        return view('contact.thanks');
    }

    public function send(ValiRequest $request)
    {

        $inputs = $request->except('action');

        if($request->input('action') === 'back'){
            return redirect()
                ->route('contact.index')
                ->withInput($inputs);
        }

        if ($request->input('action') === 'submit') {
            Mail::to($inputs['email'])->send(new ContactSendmail($inputs));
            $this->writingservice->contactData($request);
            $request->session()->regenerateToken();
            return view('contact.thanks');
        }

    }
}