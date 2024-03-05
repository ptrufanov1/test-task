<?php

return [

    'drivers' => [
        'file' => [
            'handler' => \App\Classes\Feedback\Drivers\FeedbackFileDriver::class,
            'disk' => 'local',
        ],
        'database' => [
            'handler' => \App\Classes\Feedback\Drivers\FeedbackDatabaseDriver::class,
        ]
    ],

    'handlers' => [
        'file',
        'database'
    ]

];
