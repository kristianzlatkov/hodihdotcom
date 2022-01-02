<?php

namespace Modules\Gallery\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('gallery::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('gallery::create');
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
    public function show(Request $request)
    {

        $array = Storage::disk('public')->files('gallery');

        $total=count($array);
        $per_page = 15;
        $current_page = $request->input("page") ?? 1;

        $starting_point = ($current_page * $per_page) - $per_page;

        //$array = $array->toArray();
        $array = array_slice($array, $starting_point, $per_page, true);

        $array = new Paginator($array, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        $page = DB::table('pages')->where('slug', '=' , 'gallery')->first();

        Breadcrumbs::register('gallery', function ($breadcrumbs) use ($page) {
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

        return view('gallery::gallery',['images'=>$array]);

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('gallery::edit');
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
