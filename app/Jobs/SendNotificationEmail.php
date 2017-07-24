<?php

namespace App\Jobs;

use App\Entity\User;
use App\Entity\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * SendNotificationEmail constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $car = Car::orderBy('id', 'desc')->take(1)->first();

        Mail::send('cars.email.new-car-notify', ['car' => $car], function($m) {
            $m->to($this->user->email);
        });
    }
}
