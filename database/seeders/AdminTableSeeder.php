<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Akalia',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ];
        $now = Carbon::now();
        foreach ($data as $key => $data) {
            $admin = new Admin();
            $admin->name = $data['name'];
            $admin->username = $data['username'];
            $admin->email = $data['email'];
            $admin->password = $data['password'];

            $admin->created_at = $now;
            $admin->updated_at = $now;
            $admin->save();
        }

    }
}
