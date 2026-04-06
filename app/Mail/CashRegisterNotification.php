<?php

namespace App\Mail;

use App\Models\Cash\CashRegister;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CashRegisterNotification extends Mailable
{
    use Queueable, SerializesModels;

    public CashRegister $cashRegister;
    public string $action;

    public function __construct(CashRegister $cashRegister, string $action)
    {
        $this->cashRegister = $cashRegister;
        $this->action = $action;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->action === 'open' ? 'Caja Abierta' : 'Caja Cerrada',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.cash_register_notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
