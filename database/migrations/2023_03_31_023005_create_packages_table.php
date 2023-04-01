<?php

use App\Models\Package;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('tracking_number');
            $table->string('tracker_id')->nullable();
            $table->enum('status', Package::STATUSES)->default(Package::STATUS_PENDING);
            $table->string('status_note')->nullable();
            $table->string('courier')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
