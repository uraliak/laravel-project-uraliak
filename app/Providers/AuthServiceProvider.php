<?php 
 
namespace App\Providers; 
 
// use Illuminate\Support\Facades\Gate; 
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider; 
use Illuminate\Support\Facades\Gate; 
use Illuminate\Auth\Access\Response; 
use App\Models\Comment; 
use App\Models\User; 
 
class AuthServiceProvider extends ServiceProvider 
{ 
    /** 
     * The model to policy mappings for the application. 
     * 
     * @var array<class-string, class-string> 
     */ 
    protected $policies = [ 
        // 
        'App\Models\Article' => 'App\Policies\ArticleControllerPolicy' 
    ]; 
 
    /** 
     * Register any authentication / authorization services. 
     */ 
    public function boot(): void 
    { 
        // 
        Gate::before(function (User $user) { 
            if ($user->role === 'moderator') { 
                return true; 
            } 
        }); 
        Gate::define('admincomment', function (User $user) { 
            if ($user->role === 'модератор') { 
                return Response::allow(); 
            } else return Response::deny('В доступе отказано!'); 
        }); 
        Gate::define('comment', function (User $user, Comment $comment) { 
            if ($user->id === $comment->author_id) { 
                return Response::allow(); 
            } else return Response::deny('В доступе отказано!'); 
        }); 
    } 
}