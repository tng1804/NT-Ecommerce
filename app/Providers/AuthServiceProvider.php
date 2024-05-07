<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Phân quyền
        Gate::define('my-comment', Function(User $user, Comment $comm){
            return $user->id == $comm->user_id;
        });


        // Gate::define('my-cart', Function(User $user, Cart $cart){
        //     return $user->id == $cart->user_id;
        // });
            
    }
}
