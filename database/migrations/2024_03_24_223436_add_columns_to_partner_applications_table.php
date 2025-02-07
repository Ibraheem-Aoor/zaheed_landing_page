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
        Schema::table('partner_applications', function (Blueprint $table) {
            $table->string('company_name_ar');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('iban')->nullable();
            $table->string('position')->nullable();
            $table->string('name');
            $table->string('other_file_1')->nullable();
            $table->string('other_file_2')->nullable();

            $table->string('company_name_en')->nullable()->change();
            $table->string('number_of_branches')->nullable()->change();
            $table->string('vat_no_file')->nullable()->change();
            $table->string('iban_file')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partner_applications', function (Blueprint $table) {
            $table->dropColumn(['company_name_ar', 'bank_id', 'iban', 'position', 'name', 'other_file_1', 'other_file_2']);
        });
    }
};
