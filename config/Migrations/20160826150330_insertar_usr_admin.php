<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class InsertarUsrAdmin extends AbstractMigration
{
 
    public function up()
    {
        $oFaker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($oFaker);
        $populator->addEntity("Users",1,[
                                'first_name' => 'Jose',
                                "last_name" => 'Pinto',
                                'email' => 'jpp@gmail.com',
                                'password' => function (){
                                                $hasher = new DefaultPasswordHasher();
                                                return $hasher->hash('secret');
                                             },
                                'role' => 'admin',
                                'active' => 1,
                                'created' => function () use ($oFaker){
                                                return $oFaker->dateTimeBetween($starDate = 'now', $endDate = 'now');
                                            },
                                'modified' => function () use ($oFaker){
                                                return $oFaker->dateTimeBetween($starDate = 'now', $endDate = 'now');
                                            }
                    
                    ]);
        $populator->execute();
      
    }
}