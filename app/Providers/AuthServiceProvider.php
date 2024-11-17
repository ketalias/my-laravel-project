<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\TournamentParticipant;
use Illuminate\Support\Facades\Gate;
use App\Policies\TournamentParticipantPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        TournamentParticipant::class => TournamentParticipantPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('create-participant', function (User $user) {
            return $user->role === 'admin';  // Тільки для користувачів з роллю 'admin'
        });

        Gate::define('update', function (User $user, TournamentParticipant $participant) {
            return $user->id === $participant->user_id || $user->role === 'admin';
        });

        Gate::define('delete', function (User $user, TournamentParticipant $participant) {
            return $user->id === $participant->user_id || $user->role === 'admin';
        });
    }
}
