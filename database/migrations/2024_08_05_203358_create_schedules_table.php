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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('animal_id')->constrained('customer_animals');
            $table->foreignId('doctor_id')->nullable()->constrained('users');
            $table->foreignId('created_by')->constrained('users');

            $table->string('symptoms');
            $table->dateTime('scheduled_at');
            $table->string('period');
            $table->timestamps();
            $table->softDeletes();
        });

        enum('schedules', 'period', enumValues(\App\Modules\Schedule\Enums\SchedulePeriodEnum::cases()));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
        dropEnum('schedules', 'period');
    }
};
