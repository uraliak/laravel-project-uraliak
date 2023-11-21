<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Path;
use App\Mail\StatMail;
use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Support\Facades\Mail;

class SendStatCommand extends Command

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendStat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $articleCount = Path::all()->count();
        Path::whereNotNull('id')->delete();
        $commentCount = Comment::whereDate('created_at', Carbon::today())->count();
        Mail::to('kinyabulatovauralia@gmail.com')->send(new StatMail($articleCount, $commentCount));
        return 0;
    }
}
