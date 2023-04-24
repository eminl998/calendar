<?php

namespace App\Mail;

use App\Models\VacationRequest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewVacationRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The vacation request instance.
     *
     * @var VacationRequest
     */
    public $vacationRequest;

    /**
     * The user who made the vacation request.
     *
     * @var User
     */
    public $user;

    /**
     * Create a new message instance.
     *
     * @param  VacationRequest  $vacationRequest
     * @param  User  $user
     * @return void
     */
    public function __construct(VacationRequest $vacationRequest, User $user)
    {
        $this->vacationRequest = $vacationRequest;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_vacation_request')
            ->with([
                'vacationRequest' => $this->vacationRequest,
                'user' => $this->user,
            ]);
    }
}