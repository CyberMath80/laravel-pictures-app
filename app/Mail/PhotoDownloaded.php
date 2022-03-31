<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{ User, Source };

class PhotoDownloaded extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected Source $source;
    protected User $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Source $source, User $user)
    {
        $this->source = $source;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
