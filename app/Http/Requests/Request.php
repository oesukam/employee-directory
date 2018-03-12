<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory;

abstract class Request extends FormRequest
{
    /**
     * Create a new FormRequest instance.
     *
     * @return void
     */
    public function __construct(Factory $factory)
    {
        $factory->extend(
            'phone',
            function ($attribute, $value, $parameters)
            {
                return preg_match("/^([0-9\s\-\+\(\)]*)$/", $value);
            },
            'Bad phone number format! Please try another one!'
        );
    }
}
