<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->string('name', 60);
            $table->string('type');
            $table->tinyInteger('age');
            $table->timestamps();
            $table->softDeletes();
        });

        enum('customer_animals', 'type', enumValues(\App\Modules\Customer\Enums\AnimalTypeEnum::cases()));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_animals');
        dropEnum('customer_animals', 'type');
    }
};
