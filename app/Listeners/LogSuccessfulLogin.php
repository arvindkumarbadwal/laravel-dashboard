<?php

namespace App\Listeners;

use App\Models\LoginActivity;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(Login $event)
    {
        LoginActivity::create([
            'type' => 'login',
            'user_id' => $event->user->id,
            'guard_name' => $event->guard,
            'ip_address' => $this->request->ip(),
            'user_agent' => $this->request->header('User-Agent'),
        ]);
    }
}
