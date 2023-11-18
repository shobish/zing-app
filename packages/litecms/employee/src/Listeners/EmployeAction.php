<?php

namespace Litecms\Employee\Listeners;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Litecms\Employee\Events\EmployeAction as EmployeActionEvent;
use Litecms\Employee\Notifications\EmployeAction as EmployeActionNotification;
use Litepie\Actions\Concerns\AsAction;

class EmployeAction
{
    use AsAction;

    private $allowedActions = [
        'before' => [],
        'after' => ['create'],
    ];

    /**
     * Handle the EmployeActionEvent.
     *
     * @param   EmployeActionEvent  $event
     * @return mixed
     */
    public function handle(EmployeActionEvent $event)
    {
        $function = Str::camel($event->action);
        return $this->$function($event);
    }

    /**
     * Create a new $employe.
     *
     * @param   EmployeActionEvent  $event
     * @return void
     */
    public function create(EmployeActionEvent $event)
    {
        $client = $event->employe->client;
        Notification::send($client, new EmployeActionNotification($event));
    }

    /**
     * Handle the EmployeActionEvent as a listener.
     *
     * @param   EmployeActionEvent  $event
     * @return mixed
     */
    public function asListener(EmployeActionEvent $event)
    {
        if ($this->isAllowed($event)) {
            return $this->handle($event);
        }
    }

    /**
     * Check if the event action is allowed.
     *
     * @param   EmployeActionEvent  $event
     * @return bool
     */
    private function isAllowed(EmployeActionEvent $event)
    {
        if ($event->when == 'before' &&
            !in_array($event->action, $this->allowedActions['before'])) {
            return false;
        }

        if (($event->when == 'after' &&
            !in_array($event->action, $this->allowedActions['after']))
        ) {
            return false;
        }

        return true;
    }
}
