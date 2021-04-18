<?php

namespace Modules\Index\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Newsletter\NewsletterFacade as Newsletter;


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        SEOMeta::setTitle('Home');
        $articles = DB::table('posts')->where('featured','0')->orderBy('id','desc')->take(4)->get();
        return view('index::index',['articles'=>$articles]);
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
        $notification = array();

        if ( ! Newsletter::isSubscribed($request->email) ) {
            Newsletter::subscribe($request->email,['FNAME'=>$request->name]);
            $notification['alert-type'] = 'success';
        } else {
            $notification['alert-type'] = 'error';
        }

        return view('index::create');
       // return redirect('/index#subscribeForm')->with($notification);
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
