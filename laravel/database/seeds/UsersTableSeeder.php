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
                'name' => 'administrador',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$5EM2Ie5gDLX0Z7ta6le5leFF.EWy1hFjtdES9iGnebeUvjgacXFmW',
                'remember_token' => NULL,
                'created_at' => '2019-04-24 18:50:57',
                'updated_at' => '2019-04-24 18:50:57',
            ),
        ));
        
        
    }
}