<?php

namespace App\Models;

use App\Http\Requests\FeedbackRequest;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property-read int $id
 * @property string $name
 * @property string $phone
 * @property string $message
 *
 */
class FeedbackForm extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'phone',
        'message',
    ];

    public static function createItem(FeedbackRequest $request): static
    {
        return static::query()->create($request->validated());
    }

}
