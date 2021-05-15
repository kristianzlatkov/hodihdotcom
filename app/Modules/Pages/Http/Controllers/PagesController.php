<?php

namespace Modules\Pages\Http\Controllers;

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
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


    //Return all articles from Attractions/News/New
    public function returnAllArticles(Request $request)
    {
        $typeOfPageToLoad = '';
        if ($request->getPathInfo() === '/news') {
            $typeOfPageToLoad = 'Новини';
        } else if ($request->getPathInfo() === '/new') {
            $typeOfPageToLoad = 'Ново';
        } else if ($request->getPathInfo() === '/attraction') {
            $typeOfPageToLoad = 'Атракции';
        }
        $data = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.name', '=', $typeOfPageToLoad)
            ->get();
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
        $breadcrumbsPath = substr($request->getPathInfo(), 1);// variable to be put as a path
        $blogName = ucwords($breadcrumbsPath);//variable to use as a name to push(makes the first letter capital)
        Breadcrumbs::for($breadcrumbsPath, function ($trail) use ($breadcrumbsPath, $blogName) {
            $trail->parent('home');
            $trail->push($blogName, route($breadcrumbsPath));
        });
        return view('pages::blog.index', ['articles' => $array]);
    }

    //Returns a single article according to the slug
    public function returnSingleArticle($slug, Request $request)
    {
        $typeOfArticle = '';
        if ($request->getPathInfo() === '/news/' . $slug) {
            $typeOfArticle = 'Новини';
        } else if ($request->getPathInfo() === '/new/' . $slug) {
            $typeOfArticle = 'Ново';
        } else if ($request->getPathInfo() === '/attractions/' . $slug) {
            $typeOfArticle = 'Атракции';
        }
        $article = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.name', '=', $typeOfArticle)
            ->where('posts.slug', 'LIKE', '%' . $slug . '%')
            ->first();
        if (empty($article)) {
            abort(404);
        }

        //Breadcrumbs
        $breadcrumbsPath = substr($request->getPathInfo(), 1);// variable to be put as a path
        $blogName = ucwords($breadcrumbsPath);//variable to use as a name to push(makes the first letter capital)
        Breadcrumbs::for('post', function ($trail, $post) use ($blogName, $breadcrumbsPath) {
            $trail->parent($breadcrumbsPath, $post->category);
            $trail->push($blogName, route('post', $post->id));
        });
        return view('pages::blog.view', ['newsArticle' => $article]);
    }

    //prints the static pages with prefix 'pages'
    public function showStaticPage($slug)
    {
        $page = DB::table('pages')->where('slug', '/' . $slug)->first();
        if (null === $page) {
            abort('404');
        }

        /*$breadcrumbsPath = substr($slug, 1);// variable to be put as a path
        $blogName = ucwords($breadcrumbsPath);//variable to use as a name to push(makes the first letter capital)
        Breadcrumbs::for($slug, function ($trail) use ($slug, $blogName) {
            $trail->parent('home');
            $trail->push($blogName, route('pages', $slug));
        });*/

        Breadcrumbs::register('page', function ($breadcrumbs) use ($page) {
            $breadcrumbs->push(__('index::front.page_title'), url('/'));
            $breadcrumbs->push($page->title, \Illuminate\Support\Facades\URL::current());
        });
        return view('pages::page', ['page' => $page]);
    }
}
