<?php

if (! function_exists('enum')) {
    /**
     * Modify the column to apply correctly enum type
     *
     * @param  string  $column  Name of column
     * @param  array  $availableValues  Available values
     */
    function enum(string $table, string $column, array $availableValues, ?string $default = null): void
    {
        $enum = sprintf("'%s'", implode("','", $availableValues));
        $dataTypeEnum = "{$table}_{$column}_enum";

        \Illuminate\Support\Facades\DB::statement("CREATE TYPE $dataTypeEnum AS ENUM($enum)");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE $table ALTER COLUMN $column DROP DEFAULT");
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE $table ALTER COLUMN $column TYPE $dataTypeEnum USING {$column}::text::$dataTypeEnum");

        if ($default) {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE $table ALTER COLUMN $column SET DEFAULT '{$default}'::{$dataTypeEnum}");
        }
    }
}

if (! function_exists('addEnumValues')) {
    /**
     * Add new value to enum data type
     *
     * @param  string  $table  Name of table
     * @param  string  $column  Name of column
     * @param  array  $values  New values
     */
    function addEnumValues(string $table, string $column, array $values): void
    {
        $dataTypeEnum = "{$table}_{$column}_enum";

        foreach ($values as $value) {
            \Illuminate\Support\Facades\DB::statement("ALTER TYPE $dataTypeEnum ADD VALUE IF NOT EXISTS '$value'");
        }
    }
}

if (! function_exists('dropEnum')) {
    /**
     * Drop the enum data type
     *
     * @param  string  $column  Name of column
     * @param  array  $availableValues  Available values
     * @param  string|null  $default
     */
    function dropEnum(string $table, string $column): void
    {
        $dataTypeEnum = "{$table}_{$column}_enum";

        \Illuminate\Support\Facades\DB::statement("DROP TYPE $dataTypeEnum");
    }
}
