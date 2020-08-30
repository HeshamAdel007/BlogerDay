<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;

class ContactController extends Controller
{
    public function __construct() {

        $this->middleware(['permission:read_contact'])->only('index','show');
        $this->middleware(['permission:delete_contact'])->only('destroy');

    } // End Of Construct

    public function index()
    {
        $messages = Contact::orderByDesc('created_at')->paginate(25);
        return view('pages.back-end.contact.index', compact('messages'));

    } // End Of Index

    public function store(ContactRequest $request)
    {
        $message           = new Contact;
        $message->name     = $request->name;
        $message->email    = $request->email;
        $message->message  = $request->message;
        $message->save();

        return back();

    } // End Of Store

    public function show($id)
    {
        $message = Contact::findOrFail($id);

        return view('pages.back-end.contact.show', compact('message'));

    } // End Of Show


    public function destroy($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();
        return back();

    } // End Of Destroy

} // End Of Controller
