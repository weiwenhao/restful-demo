<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Diary;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiaryPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        
    }
    
    /**
     * Determine whether the user can view the diary.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diary  $diary
     * @return mixed
     */
    public function view(User $user, Diary $diary)
    {
        //
    }

    /**
     * Determine whether the user can create diaries.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the diary.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diary  $diary
     * @return mixed
     */
    public function update(User $user, Diary $diary)
    {
        return $user->id === $diary->user_id;
    }

    /**
     * Determine whether the user can delete the diary.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Diary  $diary
     * @return mixed
     */
    public function delete(User $user, Diary $diary)
    {
        return $user->id === $diary->user_id;
    }
}
