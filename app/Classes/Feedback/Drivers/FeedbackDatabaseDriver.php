<?php

namespace App\Classes\Feedback\Drivers;

use App\Http\Requests\FeedbackRequest;
use App\Models\FeedbackForm;

class FeedbackDatabaseDriver implements FeedbackDriverInterface
{

    public function save(FeedbackRequest $feedbackRequest): bool
    {
        FeedbackForm::createItem($feedbackRequest);
        return true;
    }
}
