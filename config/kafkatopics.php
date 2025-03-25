<?php

return [
    'topics' => [
        'notification' => 'notification-order'
    ],

    'brokers' => [
        'notification' => env('KAFKA_BROKER', 'kafka:9092')
    ]
];
