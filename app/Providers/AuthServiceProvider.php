<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * SongモデルとSongPolicyの紐付け
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Song' => 'App\Policies\SongPolicy',
    ];

    /**
     * すべてのPolicyのアクセスについてadministratorの許可を与える
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // 管理者は全てのリソースにアクセスできる設定
        Gate::before(function(User $user)
        {
            if($user->role === 'administrator'){
                return true;
            }
        });
    }
}
