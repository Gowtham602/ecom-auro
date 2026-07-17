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
    Schema::create('addresses', function (Blueprint $table) {

        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->string('full_name');

        $table->string('phone',15);

        $table->string('email')->nullable();

        $table->string('house_no');

        $table->string('street');

        $table->string('area');

        $table->string('city');

        $table->string('state');

        $table->string('country')->default('India');

        $table->string('pincode');

        $table->string('landmark')->nullable();

        $table->enum('type',['Home','Office'])->default('Home');

        $table->boolean('is_default')->default(false);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
