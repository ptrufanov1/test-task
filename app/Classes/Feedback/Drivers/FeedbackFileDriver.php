<?php

namespace App\Classes\Feedback\Drivers;

use App\Http\Requests\FeedbackRequest;
use Illuminate\Support\Facades\Storage;

class FeedbackFileDriver implements FeedbackDriverInterface
{
    private const string FILE_NAME = 'feedbackData.txt';

    public function save(FeedbackRequest $feedbackRequest): bool
    {
        return Storage::disk(config('feedback.drivers.file.disk'))->append(self::FILE_NAME, $this->requestToString($feedbackRequest));
    }

    private function requestToString(FeedbackRequest $feedbackRequest): string
    {
        return collect($feedbackRequest->validated())->map(fn($value, $key) => __($key).': '.$value)->implode(', ');
    }
}
