<?php

use Illuminate\Support\Str;

if (! function_exists('enumValues')) {
    /**
     * Return all values from an enum
     */
    function enumValues($enumCases): array
    {
        return collect($enumCases)
            ->filter(function ($enum) {
                return ! Str::startsWith($enum->name, '_');
            })
            ->map(fn ($enum) => $enum->value)
            ->toArray();
    }
}
