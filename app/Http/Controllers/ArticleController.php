<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Assos;
use App\Article;

class ArticleController extends Controller {
	private $acceptFile = [ 
			'jpg',
			'jpeg',
			'png',
			'JPG'
	];
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$articles = Article::all();
		
		return view('article.admin.index',['articles'=>$articles]);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		return view('article.admin.add' ,[
				'error'=>$request->session ()->pull ( 'error', ' '),
				'name'=>$request->session ()->pull ( 'name', ' '),
				'content'=>$request->session ()->pull ( 'content', " "),
				'header_text'=>$request->session ()->pull ( 'header_text', ' '),
		]);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$article = new Article();
		$article->name = $request->input ( 'name' );
		$article->lien = str_replace(' ', '-',strtolower (urldecode($request->input ( 'name' ))));
		$article->content = $request->input ( 'contenu' );
		$article->header_text = $request->input('header');
		if ($request->hasFile ( 'header_image' )) {
			if (in_array ( $request->file ( 'header_image' )->getClientOriginalExtension(), $this->acceptFile ) && strpos($request->file('header_image')->getClientOriginalName(),"php") === false) {
				$request->file ( 'header_image' )->move ( 'assets/img/', $request->file ( 'header_image' )->getClientOriginalName () );
				$article->image = 'assets/img/' . $request->file ( 'header_image' )->getClientOriginalName ();
			} else {
				$request->session ()->flash ( 'error', 'Le fichier doit être une image' );
				$request->session ()->flash ( 'name', $article->name );
				$request->session ()->flash ( 'content', $article->content );
				$request->session ()->flash ( 'header_text', $article->header_text );
				return redirect ()->action ( 'ArticleController@add' );
			}
		}
		
		$article->save ();
		
		return redirect ()->action ( 'ArticleController@index');
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$article = Article::find($id);
		if($article == null){
			return view('errors.503');
		}
		if ($article->image != null) {
			$banner = $article->image;
		} else {
			$banner = null;
		}
		if ($article->header_text != "") {
			$content_header = $article->header_text;
		} else {
			$content_header = null;
		}
		
		return view ( 'article.show', [ 
				'content' => $article->content,
				'banner' => $banner,
				'content_header' => $content_header,
				'article_name' => $article->name,
				'id'=> $article->id,
		] );
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {
		$errors = [];
		$errors [] = $request->session ()->pull ( 'error', null );
		$article = Article::find($id);
		if ($article->image != null) {
			$banner = $article->image;
			$file = explode("/",$banner);
			$file = $file[count($file)-1];
		} else {
			$banner = null;
			$file = null;
		}
		
		if ($article->header_text != null) {
			$content_header = $article->header_text;
		} else {
			$content_header = null;
		}
		return view ( 'article.edit', [ 
				'content' => $article->content,
				"banner" => $banner,
				"content_header" => $content_header,
				"article_name" => $article->name,
				"file" => $file,
				"errors" => $errors,
				"id" => $article->id,
		] );
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function adminedit(Request $request, $article_name) {
		$errors = [];
		$errors [] = $request->session ()->pull ( 'error', null );
		$article = DB::table ( 'articles' )->where ( 'name', $article_name )->first ();
		if ($article->image != null) {
			$banner = $article->image;
			$file = explode("/",$banner);
			$file = $file[count($file)-1];
		} else {
			$banner = null;
			$file = null;
		}
	
		if ($article->header_text != null) {
			$content_header = $article->header_text;
		} else {
			$content_header = null;
		}
		return view ( 'article.edit', [
				'content' => $article->content,
				"banner" => $banner,
				"content_header" => $content_header,
				"article_name" => $article_name,
				"file" => $file,
				"errors" => $errors
		] );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$article = Article::find($id);
		
		$article->content = $request->input ( 'contenu' );
		$article->header_text = $request->input('header');
		if ($request->hasFile ( 'header_image' )) {
			if (in_array ( $request->file ( 'header_image' )->getClientOriginalExtension(), $this->acceptFile ) && strpos($request->file('header_image')->getClientOriginalName(),"php") === false) {
				$request->file ( 'header_image' )->move ( 'assets/img/', $request->file ( 'header_image' )->getClientOriginalName () );
				$article->image = 'assets/img/' . $request->file ( 'header_image' )->getClientOriginalName ();
			} else {
				$request->session ()->flash ( 'error', 'Le fichier doit être une image' );
				return redirect ()->action ( 'ArticleController@edit', [ 
						$id 
				] );
			}
		}
		if(!$request->input('old_file') && !$request->hasFile ( 'header_image' )){
			$article->image = "";
		}
		$article->save ();
		
		return redirect ()->action ( 'ArticleController@show', [ 
				$id 
		] );
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$article = Article::find($id);
		
		$article->delete();
		return redirect()->action("ArticleController@index");
	}
}
