<?php

namespace App\Notifications;

use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewNotification extends Notification implements ShouldBroadcast
{
    use Queueable;

    protected $user;
    protected $message;
    protected $notification;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, Message $message, $notification)
    {
        $this->user = $user;
        $this->message = $message;
        $this->notification = $notification;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'message_id' => $this->message->conversation->id,
            'data' => Str::ucfirst(addslashes($this->notification)),
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
                'message_id' => $this->message->conversation->id,
                'data'=> Str::ucfirst(addslashes($this->notification)),
            ],
        ]);
    }
}
