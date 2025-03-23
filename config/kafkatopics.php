<?php

return [
    'topics' => [
        'notification' => 'notification-order'
    ],

    'brokers' => [
        'notification' => env('KAFKA_BROKER', 'localhost:9092')
    ]
];
