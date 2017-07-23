<?php

use Illuminate\Support\Facades\Queue;
use App\Jobs\SendNotificationEmail;
use App\Entity\User;

class QueueTest extends \Tests\TestCase
{
    public function testSendNotificationEmail()
    {
        Queue::fake();

        /*User model fixes*/
        $user = new User();
        $user->fill([
            'id' => 1,
            'first_name' => 'Test',
            'last_name' => 'User',
            'name' => 'test',
            'email' => 'test@example.com'
        ]);

        $job = (new SendNotificationEmail($user))->onQueue('notification');
        dispatch($job);


        Queue::assertPushed(SendNotificationEmail::class, function ($job) use ($user) {
            return $job->user->id === $user->id;
        });

        // Assert a job was pushed to a given queue...
        Queue::assertPushedOn('notification', SendNotificationEmail::class);

    }
}
