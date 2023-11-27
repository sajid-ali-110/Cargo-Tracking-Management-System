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
        Schema::create('shipment_item', function (Blueprint $table) {
            $table->id('ID');
            $table->string('shipment_name',60);
            $table->foreignID("package_type")->references("ID")->on("package_types")->onDelete("cascade");
            
            $table->string("shipment_code",50);

            $table->decimal('weight', 10, 2)->default(0.00);
            $table->foreignID("origin_office_id")->references("ID")->on("office")->onDelete("cascade");
            $table->foreignID("destination_office_id")->references("ID")->on("office")->onDelete("cascade");

            $table->foreignID("sender_id")->references("ID")->on("users")->onDelete("cascade");
            $table->foreignID("receiver_id")->references("ID")->on("users")->onDelete("cascade");

            $table->boolean('isUrgent')->default(false);
            $table->string('hasImages',50);
            $table->string('status',20)->default("in-transit");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
