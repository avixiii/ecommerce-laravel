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

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'tuanpham5024@gmail.com',
                'password' => bcrypt('tuan1999')
            ]
        ]);

        DB::table('paymentmethods')->insert([
            [
                'id' => 1,
                'name' => 'Paypal',
            ],
            [
                'id' => 2,
                'name' => 'COD'
            ]
        ]);

        DB::table('status')->insert([
            [
                'id' => 1,
                'name' => 'Đang xử lý'
            ],
            [
                'id' => 2,
                'name' => 'Đang giao hàng'
            ],
            [
                'id' => 3,
                'name' => 'Đã giao'
            ],
            [
                'id' => 4,
                'name' => 'Đã nhận'
            ],
            [
                'id' => 5,
                'name' => 'Đã huỷ'
            ]
        ]);
    }
}
