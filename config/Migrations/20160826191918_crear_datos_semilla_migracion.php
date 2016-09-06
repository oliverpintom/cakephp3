<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CrearDatosSemillaMigracion extends AbstractMigration
{
    public function up()
    {
        $oFaker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($oFaker);
        
        $populator->addEntity('Users',50,[
                                'first_name' => function () use ($oFaker){
                                                return $oFaker->firstName();
                                            },
                                "last_name" => function () use ($oFaker){
                                                return $oFaker->lastName();
                                            },
                                'email' => function () use ($oFaker){
                                                return $oFaker->safeEmail();
                                            },
                                'password' => function (){
                                                $hasher = new DefaultPasswordHasher();
                                                return $hasher->hash('secret');
                                             },
                                'role' => 'user',
                                'active' => function (){
                                            return rand(0,1);
                                },
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
