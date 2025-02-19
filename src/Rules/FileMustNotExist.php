<?php

namespace Surgiie\Console\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class FileMustNotExist implements InvokableRule
{
    /**
     * The error message when validation fails.
     */
    protected string $error = 'The :name :type already exists.';

    /**
     * Construct new FileMustNotExist instance.
     */
    public function __construct(?string $error = null)
    {
        if (! is_null($error)) {
            $this->error = $error;
        }
    }

    /**
     * Check if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (is_file($value)) {
            $fail($this->error);
        }
    }
}
