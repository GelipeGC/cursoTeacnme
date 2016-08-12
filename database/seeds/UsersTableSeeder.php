<?php


use App\Entities\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }
    public function getDummyData(\Faker\Generator $faker, array $customValues = array())

    {
        return [
            'name'  => $faker->name,
            'email' =>$faker->email,
            'password'  => bcrypt('secret')             
        ];
    }
    public function run()
    {
    	
    	
        $this->createAdmin();
        $this->createMultiple(50);
    }
    private function createAdmin()
    {
    	User::create([
    		'name'	=> 'Felipe Guzman',
    		'email'	=> 'felipe.guzman@felipe.me',
    		'password'	=> bcrypt('admin')

    		]);
    }
    
}
