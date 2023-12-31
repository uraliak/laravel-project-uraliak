<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use File;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = json_decode(File::get(public_path().'/articles.json'));
        foreach($articles as $article){
            Article::create([
                'name'=>$article->name,
                'short_desc'=>$article->shortDesc,
                'desc'=>$article->desc,
                'author_id'=>'1',
            ]);
        }
    }
}
