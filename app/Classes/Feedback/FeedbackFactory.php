<?php

namespace App\Classes\Feedback;

use App\Classes\Feedback\Drivers\FeedbackDriverInterface;

class FeedbackFactory
{

    public static function make(string $driver): FeedbackDriverInterface
    {
        return new (config('feedback.drivers')[$driver]['handler']);
    }

}
