<?php

namespace App\Observers;

use App\Models\OrderEvent;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class OrderEventObserver
{
    /**
     * Handle the OrderEvent "created" event.
     */
    public function created(OrderEvent $orderEvent): void
    {
        //create event for message kafka service

        $message = new Message(
            body: [
                "userId" => $orderEvent->order->customer_id,
                "status" => $orderEvent->status,
                "payload" => "ad",
                "source" => "Order Service"
            ]
        );


        Kafka::publish(config('kafkatopics.brokers.notification'))
        ->onTopic(config('kafkatopics.topics.notification'))
        ->withMessage($message)->send();
    }

    /**
     * Handle the OrderEvent "updated" event.
     */
    public function updated(OrderEvent $orderEvent): void
    {
        $message = new Message(
            body: [
                "userId" => $orderEvent->order->user_id,
                "status" => $orderEvent->status,
                "payload" => $orderEvent->payload,
                "source" => "Order Service"
            ]
        );
        Kafka::publish('localhost:9092')->onTopic('notification')->withMessage($message)->send();
    }

    /**
     * Handle the OrderEvent "deleted" event.
     */
    public function deleted(OrderEvent $orderEvent): void
    {
        //
    }

    /**
     * Handle the OrderEvent "restored" event.
     */
    public function restored(OrderEvent $orderEvent): void
    {
        //
    }

    /**
     * Handle the OrderEvent "force deleted" event.
     */
    public function forceDeleted(OrderEvent $orderEvent): void
    {
        //
    }
}
