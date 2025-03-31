<?php

return [
    'topics' => [
        'notification' => 'notification'
    ],

    'brokers' => [
        'notification' => env('KAFKA_BROKER', 'localhost:9092')
    ]
];
