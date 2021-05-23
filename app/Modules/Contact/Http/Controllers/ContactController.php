<?php

namespace Modules\Contact\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

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

    public function sendMessage($name,$lastName,$email,$message){


    }
}
