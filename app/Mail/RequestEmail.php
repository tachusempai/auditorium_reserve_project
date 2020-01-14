<?php

namespace App\Mail;

use App\Request as AppRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $request;
    private $owner;
    private $schedules;
    private $activity;
    private $securityPeople;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $owner, $schedules, $activity, $securityPeople)
    {
        $this->request = $request;
        $this->owner = $owner;
        $this->schedules = $schedules;
        $this->activity = $activity;
        $this->securityPeople = $securityPeople;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.requestMail', [
            'request' => $this->request,
            'owner' => $this->owner,
            'schedules' => $this->schedules,
            'activity' => $this->activity,
            'securityPeople' => $this->securityPeople
        ]);
    }
}
