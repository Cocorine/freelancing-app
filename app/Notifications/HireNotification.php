<?php

namespace App\Notifications;

use App\Models\Message;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HireNotification extends Notification
{
    use Queueable;

    protected $user;
    protected $project;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Project $project, Message $message)
    {
        $this->user = $user;
        $this->project = $project;
        $this->message = $message;
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
        $url = url('/backend/projects/'.$this->project->id);
        $url = url('/inbox/'.$this->message->conversation->id);

        return (new MailMessage)
                ->greeting('Hi '.Str::ucfirst($this->user->prenom).' !')
                ->line('You have hire for work on project '.str_replace('\\','',$this->project->name))
                ->line('Click the link below to discuss with project owner')
                ->action('Let discuss', $url)
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
            'data' => Str::ucfirst(addslashes('Your are hired on project '.str_replace('\\','',$this->project->name))),
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
                'data'=> Str::ucfirst(addslashes('Your are hire')),
            ],
        ]);
    }
}
