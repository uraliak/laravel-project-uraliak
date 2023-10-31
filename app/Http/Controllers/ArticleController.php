<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
// use App\Mail\ArticleMail;
// use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Bridge\Mailgun\Transport\MailgunTransportFactory;

use App\Jobs\ArticleMailJob;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.main', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', [self::class]);
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'title'=>'required',
            'shortDesc'=>'required|min:3',
            'desc'=>'required|min:5'
        ]);
        $article = new Article;
        $article->date = $request->date;
        $article->name = $request->title;
        $article->short_desc = $request->shortDesc;
        $article->desc = $request->desc;
        $article->author_id = 1;
        $article->save();
        ArticleMailJob::dispatch($article);
        // Mail::to('kinyabulatovauralia@gmail.com')->send(new ArticleMail($article));
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // $comments = Comment::where('article_id', $article->id)->latest()->paginate(2);
        if (isset($_GET['notify'])){
            auth()->user()->notifications()->where('id', $_GET['notify'])->first()->markAsRead();
        }

        $comments = Comment::where('article_id', $article->id)
                            ->where('accept', 1)
                            ->latest()->paginate(2);
        return view('articles.show', ['article'=>$article, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        Gate::authorize('update', [self::class, $article]);
        return view('articles.edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'date'=>'required',
            'title'=>'required',
            'shortDesc'=>'required|min:3',
            'desc'=>'required|min:5'
        ]);
        $article->date = $request->date;
        $article->name = $request->title;
        $article->short_desc = $request->shortDesc;
        $article->desc = $request->desc;
        $article->author_id = 1;
        $article->save();
        return redirect()->route('article.show', ['article'=>$article]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize('delete', [self::class, $article]);
        $comments = Comment::where('article_id', $article->id)->delete();
        $article->delete();
        return redirect('/article');
    }
}
