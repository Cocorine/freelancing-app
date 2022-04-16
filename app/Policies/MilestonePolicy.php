<?php

namespace App\Policies;

use App\Models\Milestone;
use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MilestonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user, Project $project)
    {
        return optional($user) === optional($project)->project_owner || optional($user) === optional($project)->project_hire_proposal->proposer ;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Milestone $milestone)
    {
        return optional($user) === optional(optional($milestone)->project)->project_owner || optional($user) === optional(optional($milestone)->project)->project_hire_proposal->proposer ;
        return optional($user)=== optional(optional($milestone)->project)->project_owner;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user/* , Project $project */)
    {
        return true;
        //return optional($user) === optional($project)->project_owner;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Milestone $milestone)
    {
        return optional($user)=== optional(optional($milestone)->project)->project_owner;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Milestone $milestone)
    {
        return optional($user)=== optional(optional($milestone)->project)->project_owner;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Milestone $milestone)
    {
        return optional($user)=== optional(optional($milestone)->project)->project_owner;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Milestone  $milestone
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Milestone $milestone)
    {
        return optional($user)=== optional(optional($milestone)->project)->project_owner;
    }
}
