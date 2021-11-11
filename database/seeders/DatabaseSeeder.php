<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('customers')->insert([
           [
               'full_name' => 'Phạm Anh Tuấn',
               'email' => 'tuanpham5024@outlook.com',
               'phone' => '0968745024',
               'address' => 'Số 36 tổ dân phố 11 - Nguyễn Trãi - Hà Đông - Hà Nội',
               'username' => 'tuanpham5024',
               'password' => bcrypt('tuan1999')
           ]
        ]);
    }
}
