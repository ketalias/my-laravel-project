<?php

namespace App\Policies;

use App\Models\TournamentParticipant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TournamentParticipantPolicy
{
    use HandlesAuthorization;

    public function view(User $user, TournamentParticipant $participant)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    public function update(User $user, TournamentParticipant $participant)
    {
        return $user->id === $participant->creator_id || $user->role === 'admin';
    }

    public function delete(User $user, TournamentParticipant $participant)
    {
        return $user->id === $participant->creator_id || $user->role === 'admin';
    }
}


