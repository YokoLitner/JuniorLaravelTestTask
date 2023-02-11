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

        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->date('employment_date');
                $table->string('company_role');
                $table->number('company_id');
                $table->string('avatar');
                $table->timestamps();
            });

            Schema::table('users', function (Blueprint $table) {
                $table->index('company_id');

                $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->nullable()
                    ->constrained()
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('company_id');
            $table->dropIndex('company_id');
            $table->dropColumn('users');
        });
    }
};
