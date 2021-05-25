<?php

namespace Modules\Contact\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Contact\Entities\ContactForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contact::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('contact::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        $page = DB::table('pages')->where('slug', '=' , 'contact')->first();
        Breadcrumbs::register('page', function ($breadcrumbs) use ($page) {
            $breadcrumbs->push(__('index::front.page_title'), url('/'));
            $breadcrumbs->push($page->title, \Illuminate\Support\Facades\URL::current());
        });
        SEOTools::setTitle($page->title);
        SEOTools::setDescription($page->meta_description);
        SEOTools::metatags()->addMeta('keywords', $page->meta_keywords);
        SEOTools::opengraph();
        SEOTools::opengraph()->setUrl(\Illuminate\Support\Facades\URL::current());
        SEOTools::opengraph()->setSiteName($page->title);
        SEOTools::setCanonical(\Illuminate\Support\Facades\URL::current());
        return view('contact::index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contact::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function sendMessage(Request $request) {

        $allSet=$request->validate([
            'first_name' => 'required|min:2',
            'email' => 'required|email',
            'last_name' => 'required|min:2',
            'message' => 'required|min:5'
        ]);

        $contact = new ContactForm();
        $contact->name = $request->first_name;
        $contact->email = $request->email;
        $contact->lastName = $request->last_name;
        $contact->message = $request->message;
        $contact->save();

        $adminEmail=setting('site.admin_email');
        Mail::send('contact::mail.mail', ['data'=>array(
            'name' => $request->get('first_name'),
            'email' => $request->get('email'),
            'lastName' => $request->get('last_name'),
            'message' => $request->get('message'),
        ),], function($message) use ($request,$adminEmail){
            $message->from($request->email);
            $message->to($adminEmail, 'Hello Admin');
        });

       return back()->with('success', trans('contact::front.thanks_message'));
    }
}
