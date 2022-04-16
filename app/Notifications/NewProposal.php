<?php

namespace App\Notifications;

use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProposal extends Notification
{
    use Queueable;

    protected $user;
    protected $project;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Project $project)
    {
        $this->user = $user;
        $this->project = $project;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = url('/dashboard/projects/'.$this->project->id.'/proposals');

        return (new MailMessage)
                ->greeting('Hi!')
                ->line('One of your project has new proposal!')
                ->action('View proposals', $url)
                ->line('Thanks,');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $this->user->id,
            'user_name' => $this->user->nom . " " .$this->user->prenom ,
            'project_id' => $this->project->id,
            'data' => Str::ucfirst(addslashes('New proposal are submit')),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id' => $this->id,
            'read_at' => null,
            'created_at' => Carbon::now(),
            'data' => [
                'user_id' => $this->user->id,
                'user_name' => $this->user->nom . " " .$this->user->prenom ,
                'project_id' => $this->project->id,
                'data'=> Str::ucfirst(addslashes('New proposal are submit')),
            ],
        ]);
    }
}
