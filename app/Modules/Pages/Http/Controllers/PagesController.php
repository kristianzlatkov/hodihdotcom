<?php

namespace Modules\Pages\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\assertObjectNotHasAttribute;

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

    public function showArticle($param){

        $article = DB::table('posts')->where('slug','/attractions/'.$param)->first();
        if(empty($article)){
            abort(404);
        }
         return view('pages::attractions', ['articleContent' => $article]);
    }

    public function showAllNews(){
        $news=DB::table('posts')->where('featured','1')->get();
        return view('pages::news',['news'=>$news]);
    }

    public function showNewsArticle($slug){
        $newsArticle=DB::table('posts')->where('featured','1')
            ->where('slug',$slug)->first();
        if(empty($newsArticle)){
            abort(404);
        }
        return view('pages::newsArticle',['newsArticle'=>$newsArticle]);
    }

    public function whatIsNewAllArticles(){
        $newArticles=DB::table('posts')->where('featured','1')
            ->where('category_id','2')->get();
        dd($newArticles);
        return view('pages::whatIsNew',['newArticles'=>$newArticles]);
    }
    public function showWhatIsNewArticle($slug){
        $newArticle=DB::table('posts')->where('featured','1')
            ->where('category_id','2')->first();
        if(empty($newsArticle)){
            abort(404);
        }
        return view('pages::whatIsNewArticle',['newsArticle'=>$newArticle]);
    }
}
