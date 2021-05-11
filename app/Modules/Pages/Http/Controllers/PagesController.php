<?php

namespace Modules\Pages\Http\Controllers;

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
        return view('pages::'.$id);
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
    public function returnAllArticles(Request $request){
        $typeOfPageToLoad='';
        if($request->getPathInfo()==='/news'){
            $typeOfPageToLoad='Новина';
        }
        else if($request->getPathInfo()==='/new'){
            $typeOfPageToLoad='Ново';
        }
        else if($request->getPathInfo()==='/attraction'){
            $typeOfPageToLoad='Атракция';
        }
        $news=DB::table('posts')
            ->join('categories','posts.category_id','=','categories.id')
            ->where('categories.name','=',$typeOfPageToLoad)
            ->get();
        $total=count($news);
        $per_page = 10;
        $current_page = $request->input("page") ?? 1;

        $starting_point = ($current_page * $per_page) - $per_page;
        $news=$news->toArray();
        //$array = $array->toArray();
        $array = array_slice($news, $starting_point, $per_page, true);

        $array = new Paginator($array, $total, $per_page, $current_page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        return view('pages::blog.index',['articles'=>$array]);
    }

   //Returns a single article according to the slug
    public function returnSingleArticle($slug,Request $request){
        $typeOfArticle='';
        if($request->getPathInfo()==='/news/'.$slug){
            $typeOfArticle='Новина';
        }
        else if($request->getPathInfo()==='/new/'.$slug){
            $typeOfArticle='Ново';
        }
        else if($request->getPathInfo()==='/attractions/'.$slug){
            $typeOfArticle='Атракция';
        }
        $article=DB::table('posts')
            ->join('categories','posts.category_id','=','categories.id')
            ->where('categories.name','=',$typeOfArticle)
            ->where('posts.slug',$slug)
            ->first();
        if(empty($article)){
            abort(404);
        }
        return view('pages::blog.view',['newsArticle'=>$article]);
    }

    //prints the static pages with prefix 'pages'
    public function showStaticPage($slug){
    $page=DB::table('pages')->where('slug','/'.$slug)->first();
   if(null===$page){
       abort('404');
   }
    return view('pages::page',['page'=>$page]);
    }
}
