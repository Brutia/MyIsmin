<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Assos;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($article_name)
    {
    	
    	$article = DB::table('articles')->where('name', $article_name)->first();
    	if($article->image != null){
    		$banner = $article->image;
    	}else{
    		$banner = null;
    	}
    	if($article->header_text != ""){
    		$content_header = $article->header_text;
    	}else{
    		$content_header = null;
    	}
    	
    	return view('article.show', ['content'=> $article->content, 'banner'=>$banner, 'content_header'=>$content_header, 'article_name'=>$article_name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article_name)
    {
    	$article = DB::table('articles')->where('name', $article_name)->first();
    	if($article->image != null){
    		$banner = $article->image;
    	}else{
    		$banner = null;
    	}
    	
    	if($article->header_text != null){
    		$content_header = $article->header_text;
    	}else{
    		$content_header = null;
    	}
        return view('article.edit',['content'=> $article->content, "banner"=>$banner, "content_header"=>$content_header, "article_name"=>$article_name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article_name)
    {
    	$article = Article::where('name', $article_name)->first();
    	
    	$article->content = $request->input('contenu');
    	if ($request->hasFile('header_image')) {
    		$request->file('header_image')->move('assets/img/',$request->file('header_image')->getClientOriginalName());
//     		$image=;
    		$article->image = 'assets/img/'.$request->file('header_image')->getClientOriginalName();
//     		dd($request->file('header_image')->getClientOriginalName());
    	}
    	$article->save();
    	
    	return redirect()->action('ArticleController@show',[$article_name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
