<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'Andy Wong',
                'email' => 'andywongwh@outlook.com',
                'avatar' => 'users/default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$VREfVExVOlIN630NT4cG5ugxF/e2F0jg6P.g.Td.SDm692l1CSBn.',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2020-08-10 11:59:08',
                'updated_at' => '2020-08-11 07:35:43',
            ),
        ));
        
        
    }
}