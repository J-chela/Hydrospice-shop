<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'flash_sale')) {
                $table->boolean('flash_sale')->default(false);
            }

            if (!Schema::hasColumn('products', 'flash_sale_ends_at')) {
                $table->dateTime('flash_sale_ends_at')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'flash_sale')) {
                $table->dropColumn('flash_sale');
            }

            if (Schema::hasColumn('products', 'flash_sale_ends_at')) {
                $table->dropColumn('flash_sale_ends_at');
            }
        });
    }
};
