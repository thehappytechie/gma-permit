<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->string('permit_type');
            $table->string('permit_number');
            $table->foreignId('permit_unit_id')->constrained('permit_units')->cascadeOnDelete();
            $table->string('vessel_name')->nullable();
            $table->string('registry_port')->nullable();
            $table->string('gross_tonnage')->nullable();
            $table->string('imo_number')->nullable();
            $table->string('call_sign')->nullable();
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
    }
};
