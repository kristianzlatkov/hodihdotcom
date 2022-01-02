<?php

namespace Modules\Index\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Blog\Entities\Post;
use Modules\Blog\Http\Controllers\BlogController;
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
        $data=Post::with(['category'])->whereHas('category', function ($q) {
            $q->where('slug', 'attractions');

        })->paginate(15);
        SEOMeta::setTitle('Home');
        //getting gallery photos from Gallery storage into a collection so we can use the "take" method
        $array = collect(Storage::disk('public')->files('gallery'));
        $images=$array->take(5);
        $images->all();
        return view('index::index',['articles'=>$data,'images'=>$images]);
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
       return redirect('/#subscribe')->with('success',trans('index::front.subscribe'));
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
