<?php

namespace Modules\Index\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use Modules\Gallery\Http\Controllers\GalleryController;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        SEOMeta::setTitle('Home');
        //getting articles from the DB
        $articles = DB::table('posts')->where('featured','0')->orderBy('id','desc')->take(4)->get();
        //getting gallery photos from the GalleryController
        $galleryController = new GalleryController();
        $myRequest = new \Illuminate\Http\Request();
        $myRequest->setMethod('GET');
        $myRequest->url('/gallery');
        $images=$galleryController->show($myRequest);
        return view('index::index',['articles'=>$articles,'images'=>$images->render()]);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('index::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //checks if the method is a get. If so, calling method index();
        $method=Request::METHOD_POST;
        if(!$method){
            $this->index();
        }

        $notification = array();

        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email);
            $notification['alert-type'] = 'success';
        } else {
            $notification['alert-type'] = 'error';
        }

       // return view('index::index');
       return redirect('/#subscribe')->with($notification);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('index::'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('index::edit');
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
}
