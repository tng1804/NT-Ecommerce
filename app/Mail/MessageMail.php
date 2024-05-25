<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;
    public $id,$userName, $name,$image, $quantity, $price, $desciption;

    /**
     * Create a new message instance.
     */
    public function __construct($id,$userName, $name,$image, $quantity, $price, $desciption)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->name = $name;
        $this->image = $image;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->desciption = $desciption;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Message Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.messageProduct',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
