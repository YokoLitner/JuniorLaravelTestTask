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
        if(!Schema::hasTable('companies')){
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                $table->string('name', 64);
                $table->string('logo');
                $table->number('founder_id');
                $table->timestamps();
            });

            Schema::table('companies', function (Blueprint $table) {
                $table->index('founder_id');

                $table->foreign('founder_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign('founder_id');
            $table->dropIndex('founder_id');
            $table->dropColumn('companies');
        });
    }
};
