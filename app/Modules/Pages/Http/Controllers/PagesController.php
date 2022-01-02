<?php

namespace Modules\Pages\Http\Controllers;

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use Spatie\Sitemap\SitemapGenerator;
use function PHPUnit\Framework\assertObjectNotHasAttribute;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use function PHPUnit\Framework\isNull;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('pages::pages.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pages::create');
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
    public function show($id)
    {
        return view('pages::' . $id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('pages::edit');
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

    public static function sitemap(){
        $sitemapObject= array(SitemapGenerator::create('https://spatie.be/en')->writeToFile('sitemap.xml'));
        //$sitemap = SitemapGenerator::create('http://hodihdotcom.loc')->getSitemap()->getTags();
        dd($sitemapObject);
        return view('pages::sitemap')->with('sitemap',$sitemap);
    }
    //prints the static pages with prefix 'pages'
    public function showStaticPage($slug)
    {
        if($slug==='sitemap'){
          return PagesController::sitemap();
        }
        $page = DB::table('pages')->where('slug', '/' . $slug)->first();
        if (null === $page) {
            abort('404');
        }

        Breadcrumbs::register('page', function ($breadcrumbs) use ($page) {
            $breadcrumbs->push(__('index::front.page_title'), url('/'));
            $breadcrumbs->push($page->title, \Illuminate\Support\Facades\URL::current());
        });

        SEOTools::setTitle(ucwords($slug));
        SEOTools::setDescription($page->meta_description);
        SEOTools::metatags()->addMeta('keywords', $page->meta_keywords);
        SEOTools::opengraph();
        SEOTools::opengraph()->setUrl(\Illuminate\Support\Facades\URL::current());
        SEOTools::opengraph()->setSiteName(ucwords($slug));
        SEOTools::opengraph()->addImage(asset('assets/images/pages'.$page->image), ['height' => 1200, 'width' => 630]);
        SEOTools::setCanonical(\Illuminate\Support\Facades\URL::current());
        return view('pages::page', ['page' => $page]);
    }
}
