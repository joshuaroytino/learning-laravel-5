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

    /**
     * Create a new articles controller instance.
     */
    function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
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
        $this->createArticle($request);

        flash()->success('Your article has been created')->important();
        return redirect('articles');
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

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles')->with([
            'flash_message' => 'Your article has been updated',
            'flash_message_important' => true
        ]);
    }

    /**
     * Sync up the list of tags in the database
     *
     * @param Article $article
     * @param array $tags
     * @internal param ArticleRequest $request
     */
    private function syncTags(Article $article, $tags)
    {
        $article->tags()->sync((array) $tags);
    }

    /**
     * Save a new article
     *
     * @param ArticleRequest $request
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}
