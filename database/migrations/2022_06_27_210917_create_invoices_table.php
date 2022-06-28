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
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('issue_date');
            $table->string('customer_name', 50);
            $table->string('customer_email', 50);
            $table->string('address', 100);
            $table->string('city', 100);
            $table->string('country', 100);
            $table->string('post_code', 16);
            $table->float('tax');
            $table->smallInteger('total_items');
            $table->float('total_value');
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function(Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('invoices');
    }
};
