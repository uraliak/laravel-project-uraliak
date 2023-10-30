<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
// use Illuminate\Mail\Mailables\Address;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\Mail;
use App\Models\Article;

class ArticleMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    protected $article;

    public function __construct(Article $article)
    {
        $this->article=$article;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         from: new Address('kinyabulatovauralia@gmail.com', 'Uralia'),
    //         replyTo: [
    //             new Address('kinyabulatovauralia@gmail.com', 'Uralia'),
    //         ],
    //         subject: 'Order Shipped',
    //     );   
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'main.article',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromPath('/path/to/file'),
        ];
    }
    public function build(){
        return $this->from('laravel@testingB.ru', "Uralia")
                    ->view('mail.article', ['article'=>$this->article]);
    }

    // public function build(){
    //     return $this->from(env('MAIL_USERNAME'))
    //                 ->view('mail.article', ['article'=>$this->article]);
    // }
}
