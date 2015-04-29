<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;

/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller {

    function __construct()
    {
        $this->middleware('auth', [ 'only' => 'create']);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }


    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $article->tags()->attach($request->input('tag_list'));

        return redirect('articles')->with([
            'flash_message' => 'Your article has been created',
            'flash_message_important' => true
        ]);
    }

    /**
     * @param Article $article
     * @internal param $id
     * @return \Illuminate\View\View
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.edit',  compact('article', 'tags'));
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @internal param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        return redirect('articles');
    }
}
