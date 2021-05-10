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
//Returns the attraction with the slug.
    public function returnSingleAttraction($slug){
        $article = DB::table('posts')->where('slug','/attractions/'.$slug)->first();
        if(empty($article)){
            abort(404);
        }
        SEOMeta::setTitle($article->seo_title);
//        SEOMeta::setDescription('This is my page description');
//        SEOMeta::setCanonical('https://codecasts.com.br/lesson');
         return view('pages::blog.view', ['articleContent' => $article]);
    }

    //Return all attractions
    public function returnAllAttractions(){
        $attractions=DB::table('posts')->where('slug','LIKE','%'.'attractions'.'%')->get();
        return view('pages::blog.index',['attractions'=>$attractions]);

    }
    //Shows a single news article according to the slug provided in the route.
    public function returnSingleNewsArticle($slug){
        $newsArticle=DB::table('posts')->where('featured','1')
            ->where('slug',$slug)->first();
        if(empty($newsArticle)){
            abort(404);
        }
        return view('pages::blog.view',['newsArticle'=>$newsArticle]);
    }

//Shows all news in the news
    public function returnAllNews(Request $request){
        $news=DB::table('posts')->where('featured','1')->get();
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

        return view('pages::blog.index',['news'=>$array]);
    }



    /*//Returns all the articles
    public function return(){
        $newArticles=DB::table('posts')->where('featured','1')
            ->where('category_id','2')->get();
        dd($newArticles);
        return view('pages::blog.index',['newArticles'=>$newArticles]);
    }*/

   /* //Returns a single article according to the slug provided in the route.
    public function showWhatIsNewArticle($slug){
        $newArticle=DB::table('posts')->where('featured','1')
            ->where('category_id','2')->first();
        if(empty($newsArticle)){
            abort(404);
        }
        return view('pages::blog.view',['newsArticle'=>$newArticle]);
    }*/
    //prints the static pages with prefix 'pages'
    public function showStaticPage($slug){
    $page=DB::table('pages')->where('slug','/'.$slug)->first();
   if(null===$page){
       abort('404');
   }
    return view('pages::page',['page'=>$page]);
    }
}
