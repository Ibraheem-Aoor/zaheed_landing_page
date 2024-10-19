<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partner_applications', function (Blueprint $table) {
            $table->id();
            $table->string('store_name_en');
            $table->string('store_name_ar');
            $table->integer('category_id'); // Adjust the type as needed
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('number_of_branches')->nullable();
            $table->string('username_en')->nullable();
            $table->string('username_ar')->nullable();
            $table->bigInteger('city_id'); // Adjust the type as needed
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('company_name_ar');
            $table->string('company_name_en')->nullable();
            $table->string('commercial_register')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('company_email');
            $table->string('company_phone');
            $table->string('name')->comment('representative name');
            $table->string('position')->nullable()->comment('representative position');
            $table->string('iban')->nullable();
            $table->string('commercial_no_file');
            $table->string('vat_no_file')->nullable();
            $table->string('iban_file')->nullable();
            $table->string('other_file_1')->nullable();
            $table->string('other_file_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_applications');
    }
};
