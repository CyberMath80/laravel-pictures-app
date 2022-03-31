<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\{ Source, User, Photo };

class PhotoDownloaded extends Notification
{
    use Queueable;

    protected Source $source;
    protected Photo $photo;
    protected User $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Source $source, Photo $photo, User $user)
    {
        $this->source = $source;
        $this->photo = $photo;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'source' => $this->source,
            'photo' => $this->photo,
            'user' => $this->user,
        ];
    }
}
