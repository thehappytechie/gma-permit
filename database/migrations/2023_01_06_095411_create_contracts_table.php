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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('hash_id')->unique()->nullable();
            $table->foreignId('company_id')->constrained('companies')->nullable();
            $table->foreignId('category_id')->constrained('categories')->nullable();
            $table->foreignId('department_id')->constrained('departments')->nullable();
            $table->string('title');
            $table->longText('comment')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('start_date')->nullable();
            $table->string('status')->nullable();
            $table->string('file_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contract_scope')->nullable();
            $table->string('contract_code')->nullable();
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
        Schema::dropIfExists('contracts');
    }
};
