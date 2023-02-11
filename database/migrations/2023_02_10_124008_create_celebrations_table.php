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
        if (!Schema::hasTable('celebrations')) {
            Schema::create('celebrations', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->date('date');
                $table->number('user_id');
                $table->timestamps();
            });

            Schema::table('celebrations', function (Blueprint $table) {
                $table->index('user_id');

                $table->foreign('user_id')
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
        Schema::table('celebrations', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropIndex('user_id');
            $table->dropColumn('celebrations');
        });
    }
};
