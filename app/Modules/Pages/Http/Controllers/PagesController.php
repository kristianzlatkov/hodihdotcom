<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
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
    public function showAttraction($slug){
        $article = DB::table('posts')->where('slug','/attractions/'.$slug)->first();
        if(empty($article)){
            abort(404);
        }
        SEOMeta::setTitle($article->seo_title);
//        SEOMeta::setDescription('This is my page description');
//        SEOMeta::setCanonical('https://codecasts.com.br/lesson');
         return view('pages::blog.view', ['articleContent' => $article]);
    }

//Shows all news in the news
    public function showAllNews(){
        $news=DB::table('posts')->where('featured','1')->get();
        return view('pages::blog.view',['news'=>$news]);
    }

    //Shows a single news article according to the slug provided in the route.
    public function showNewsArticle($slug){
        $newsArticle=DB::table('posts')->where('featured','1')
            ->where('slug',$slug)->first();
        if(empty($newsArticle)){
            abort(404);
        }
        return view('pages::blog.view',['newsArticle'=>$newsArticle]);
    }

    //Returns all the articles
    public function whatIsNewAllArticles(){
        $newArticles=DB::table('posts')->where('featured','1')
            ->where('category_id','2')->get();
        dd($newArticles);
        return view('pages::blog.view',['newArticles'=>$newArticles]);
    }

    //Returns a single article according to the slug provided in the route.
    public function showWhatIsNewArticle($slug){
        $newArticle=DB::table('posts')->where('featured','1')
            ->where('category_id','2')->first();
        if(empty($newsArticle)){
            abort(404);
        }
        return view('pages::blog.view',['newsArticle'=>$newArticle]);
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
