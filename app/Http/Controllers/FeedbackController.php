<?php

namespace App\Http\Controllers;

use App\Classes\Feedback\Feedback;
use App\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
    public function __invoke(FeedbackRequest $request)
    {
        return response()->json(['success' => Feedback::save($request)]);
    }
}
