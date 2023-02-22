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
        if (!Schema::hasTable('company_user')) {
            Schema::create('company_user', function (Blueprint $table) {
                $table->integer('company_id');
                $table->integer('user_id');
            });

            Schema::table('company_user', function (Blueprint $table) {
                $table->index('company_id');
                $table->index('user_id');
                $table->index(['company_id', 'user_id']);

                $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');

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
        Schema::table('company_user', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['user_id']);

            $table->dropIndex(['company_id']);
            $table->dropIndex(['user_id']);
            $table->dropIndex(['company_id', 'user_id']);

            $table->dropIfExists('company_user');
        });
    }
};
