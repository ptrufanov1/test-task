<?php

namespace App\Classes\Feedback\Drivers;

use App\Http\Requests\FeedbackRequest;

interface FeedbackDriverInterface
{

    public function save(FeedbackRequest $feedbackRequest): bool;

}
