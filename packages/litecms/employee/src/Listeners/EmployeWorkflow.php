<?php

namespace Litecms\Employee\Listeners;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Litecms\Employee\Events\EmployeWorkflow as EmployeWorkflowEvent;
use Litecms\Employee\Notifications\EmployeWorkflow as EmployeWorkflowNotification;
use Litepie\Actions\Concerns\AsAction;

class EmployeWorkflow
{
    use AsAction;

    private $allowedTransitions = [
        'before' => [],
        'after' => ['publish', 'submit', 'approve'],
    ];

    public function handle(EmployeWorkflowEvent $event)
    {
        $function = Str::camel($event->transition);
        return $this->$function($event);
    }

    /**
     * Sends a notification to the client when the $employe is submitted.
     *
     * @param EmployeWorkflowEvent $event The event object.
     * @return void
     */
    public function submit(EmployeWorkflowEvent $event)
    {
        $client = $event->employe->client;
        Notification::send($client, new EmployeWorkflowNotification($event));
    }

    /**
     * Sends a notification to the client when the $employe is published.
     *
     * @param EmployeWorkflowEvent $event The event object.
     * @return void
     */
    public function publish(EmployeWorkflowEvent $event)
    {
        $client = $event->employe->client;
        Notification::send($client, new EmployeWorkflowNotification($event));
    }

    /**
     * Sends a notification to the client when the $employe is approved.
     *
     * @param EmployeWorkflowEvent $event The event object.
     * @return void
     */
    public function approve(EmployeWorkflowEvent $event)
    {
        $client = $event->employe->client;
        Notification::send($client, new EmployeWorkflowNotification($event));
    }

    /**
     * Handles the $employe workflow event as a listener.
     *
     * @param EmployeWorkflowEvent $event The event object.
     * @return void
     */
    public function asListener(EmployeWorkflowEvent $event)
    {
        if (($event->when == 'before' &&
            in_array($event->transition, $this->allowedTransitions['before']) ||
            $event->when == 'after' &&
            in_array($event->transition, $this->allowedTransitions['after']))
        ) {
            return $this->handle($event);
        }
    }
}
