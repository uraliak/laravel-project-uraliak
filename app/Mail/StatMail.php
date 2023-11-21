<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $articleCount;
    protected $commentCount;

    public function __construct(int $articleCount, int $commentCount)
    {
        $this->articleCount=$articleCount;
        $this->commentCount=$commentCount;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Stat Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build(){
        return $this->from('laravel@testingB.ru', "Uralia")
                    ->view('mail.stat', ['articleCount'=>$this->articleCount, 'commentCount'=>$this->commentCount]);
    }
}
