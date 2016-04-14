<?php
namespace App\Http\Controllers;


use DB;
use App\User;
use App\Assos;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Controllers\BaseController;
use App\Http\Requests\Request;

class ArticleController extends BaseController{
	
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function display($article_name){
		$assosNames = new Assos();
		$assosNames = $assosNames->getAssos();
		$article = DB::table('articles')->where('name', $article_name)->first();
		if($article->image != null){
			$banner = $article->image;
		}else{
			$banner = null;
		}
		return view('article', ['content'=> $article->content, 'banner'=>$banner, 'content_header'=>$article->name]);
	}
}