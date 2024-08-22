<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JobPolicy
{
    public function edit(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }

    /**
     * Determine whether the user can create a job.
     */
    public function create(): bool
    {
        return !Auth::guest();
    }
}
