<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamp('entry_date');
            $table->timestamp('exit_date')->nullable();
            $table->integer('interior');
            $table->integer('house');
            $table->string('plate');
            $table->string('brand');
            $table->string('left_state', 10);
            $table->string('right_state', 10);
            $table->string('back_state', 10);
            $table->string('front_state', 10);
            $table->text('observations')->nullable();
            $table->string('antenna', 2);
            $table->string('frontal', 2);
            $table->string('spare_parts', 2);
            $table->string('mirrors', 2);
            $table->string('lights', 2);
            $table->string('stops', 2);
            $table->string('glasses', 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
