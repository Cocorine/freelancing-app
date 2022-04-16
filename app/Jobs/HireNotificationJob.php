<?php

namespace App\Jobs;

use App\Models\Message;
use App\Models\Project;
use App\Models\User;
use App\Notifications\HireNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class HireNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $project;
    protected $message;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user,Project $project, Message $message)
    {
        $this->user = $user;
        $this->project = $project;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new HireNotification(Auth::user(), $this->project, $this->message));
    }
}
