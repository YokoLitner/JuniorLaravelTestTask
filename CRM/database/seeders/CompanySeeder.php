<?php

namespace Database\Seeders;

//use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => "admin",
            'email' => "admin@local.in",
        ]);

        DB::table('users')->insert([
            'first name' => "admin",
            'email' => "admin@local.in",
            'password' => "password",
        ]);
    }
}
