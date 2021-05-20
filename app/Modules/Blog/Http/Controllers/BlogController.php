<?php

namespace Modules\Blog\Http\Controllers;

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Modules\Blog\Entities\Post;
use Artesaos\SEOTools\Facades\SEOTools;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blog::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::create');
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
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('blog::edit');
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
    //Return all articles from Attractions/News/New
    public function returnAllArticles($categorySlug='attractions', Request $request)
    {
        $data=Post::all()
            ->where('category.slug','=',$categorySlug)
            ->load(['category']);
        $total = count($data);
        $per_page = 10;
        $current_page = $request->input("page") ?? 1;
        $starting_point = ($current_page * $per_page) - $per_page;
        $data = $data->toArray();
        //$array = $array->toArray();
        $array = array_slice($data, $starting_point, $per_page, true);

        $array = new Paginator($array, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);
        //Breadcrumbs
        Breadcrumbs::register('page', function ($breadcrumbs) use ($data) {
            $breadcrumbs->push(__('index::front.page_title'), url('/'));
            $breadcrumbs->push(__('pages::front.blog_title'),route('blog'));
            if(!empty($data)){
                $breadcrumbs->push($data->title, \Illuminate\Support\Facades\URL::current());
            }
        });
        return view('blog::index', ['articles' => $array]);
    }

    //Returns a single article according to the slug
    public function returnSingleArticle($categorySlug=null, $articleSlug)
    {
        $article=Post::with(['category'])
            ->where('slug',$articleSlug)
            ->first();
        SEOTools::setTitle($article->meta_title);
        SEOTools::setDescription($article->meta_description);
        SEOTools::metatags()->addMeta('keywords', $article->meta_keywords);
        SEOTools::opengraph();
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::opengraph()->setSiteName($article->meta_title);
        //SEO::opengraph()->addImage(asset('assets/images/content/fb-share-img.jpg'), ['height' => 1200, 'width' => 630]);
        SEOTools::setCanonical(URL::current());
        //Breadcrumbs
        Breadcrumbs::register('post', function ($breadcrumbs) use ($article) {
            $breadcrumbs->push(__('index::front.page_title'), url('/'));
            $breadcrumbs->push(__('blog::front.page_title'),route('blog.index'));
            $breadcrumbs->push($article->category->name, \Illuminate\Support\Facades\URL::current());
            $breadcrumbs->push($article->title, \Illuminate\Support\Facades\URL::current());
        });
        return view('blog::view', ['article' => $article]);
    }

}
