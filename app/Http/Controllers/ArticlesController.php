<?php
	
	namespace App\Http\Controllers;
	
	use App\Article;
	use App\Http\Requests;
	use App\Http\Controllers\Controller;
	use Carbon\Carbon;
	use App\Http\Requests\ArticleRequest;
	use Illuminate\Http\Request; // -- not frmo laracasts, but from comments
	use Illuminate\Support\Facades\Auth; // ^^^^^^^
	
	class ArticlesController extends Controller
	{
		/**
			*Show all articles.
			*
			*@return Response
		*/
		
		public function __construct(){
			$this->middleware("auth", ["except" => "index", "show"]);
		}
		
		
		
		public function index () 
		{
			
			$articles = Article::latest("published_at")->published()->get();
			
			return view("articles.index", compact("articles"));
			
		}
		/**
		*Show a single article
		*
		*@param Article $article
		*@return Response
		*/
		
		
		public function show (Article $article) 
		{
			
			return view("articles.show", compact("article"));
		}
		
		
		
		public function create() {
			
			$tags = \App\Tag::lists("name", "id");
			
			return view("articles.create", compact('tags'));
			
		}
		
		
		
		public function store (ArticleRequest $request){
			
		/*	$article = new Article($request->all());
			
			\Auth::user()->articles()->save($article);
		*/
		
			$article = Auth::user()->articles()->create($request->all());
			
			$article->tags()->attach($request->input("tag_list"));
			
	
			flash()->overlay("Your article has been successfully created", "Good Job");
			
			return redirect("articles");
		}
		
		/**
		*Edit and existing article
		*
		*@param Article $article
		*@return Response
		*/
		
		public function edit (Article $article) {
			
			$tags = \App\Tag::lists("name", "id");

			
			return view("articles.edit", compact("article", "tags"));
		}
		
		
		
		public function update (Article $article, ArticleRequest $request) {
			
			$article->update($request->all());
			
			return redirect("articles");
			
		}
		
	}
