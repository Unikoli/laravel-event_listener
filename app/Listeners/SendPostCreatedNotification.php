<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Jobs\SendPostCreatedNotificationJob;
use App\Mail\PostCreatedMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostCreatedNotification 

{
    /**
     * Create the event listener.
     */
    public function __construct(PostCreated $event)
    {
        
       
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event)
    {
        // SendPostCreatedNotificationJob::dispatch($event->post);
        $post = $event->post;
        $users = User::all();
        // dd($users);
        foreach ($users as $user) {
            // dd($user);
            Mail::to($user->email)->send(new PostCreatedMail($post));
            // dd('heyheyfdgdsfdsf123');
        }
        
    }
}
