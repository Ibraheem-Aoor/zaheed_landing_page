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
            $table->string('number_of_branches');
            $table->string('username_en');
            $table->string('username_ar');
            $table->string('email');
            $table->bigInteger('city_id'); // Adjust the type as needed
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('company_name_en');
            $table->string('commercial_register');
            $table->string('tax_number');
            $table->string('company_email');
            $table->string('company_phone');
            $table->string('commercial_no_file');
            $table->string('vat_no_file');
            $table->string('iban_file');
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
