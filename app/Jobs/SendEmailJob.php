<?php

namespace App\Jobs;

use App\Models\LandingPageContact;
use App\Notifications\NewContactNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Throwable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected LandingPageContact $contact)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try{

            Notification::route('mail', 'info@zaheed.sa')
            ->notify(new NewContactNotification($this->contact));
        }catch(Throwable $e)
        {
            info('SendEmailJob ERROR: ' . $e->getMessage());
        }
    }
}
