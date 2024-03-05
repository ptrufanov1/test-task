<?php

namespace App\Classes\Feedback;

use App\Http\Requests\FeedbackRequest;
use Exception;
use Illuminate\Support\Facades\Log;

class Feedback
{

    public static function save(FeedbackRequest $request): bool
    {
        try {
            foreach (config('feedback.handlers') as $driver) {
                FeedbackFactory::make($driver)->save($request);
            }
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }

        return true;

    }

}
