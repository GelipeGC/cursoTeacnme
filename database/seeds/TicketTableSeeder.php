<?php

use Illuminate\Database\Seeder;
use App\Entities\Ticket;

class TicketTableSeeder extends BaseSeeder
{
    public function getModel()
    {
    	return new Ticket();
    }
    public function getDummyData(\Faker\Generator $faker, array $customValues = array())
    {
    	return [
    	'title'	=> $faker->sentence(),
    	'status'	=> $faker->randomElement(['open','open','closed']),
    	//lo podemos hacer de 3 maneras direfentes
        //1. 'user_id' => rand(1,51)
        //2. 'user_id' => $this->createFrom('UserTableSeeder')
        'user_id'	=> $this->getRandom('User')->id
    	];
    }
    
}
