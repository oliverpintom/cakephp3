<?php

use Phinx\Migration\AbstractMigration;

class CrearLibroMarcasSemillaMigracion extends AbstractMigration
{
    public function up()
    {
        $oFaker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($oFaker);
        $populator->addEntity("book_marks", 200, [
                            "title" => function() use ($oFaker){
                                        return $oFaker->sentence(   $nbWorks = 3,
                                                                    $variableNbWorks = true
                                                                );
                                        },
                            "description" => function() use ($oFaker){
                                        return $oFaker->paragraph(   $nbSentences = 3,
                                                                    $variableNbSentences = true
                                                                );
                                        },
                            "url" => function() use ($oFaker){
                                        return $oFaker->url;
                                        },
                            'created' => function () use ($oFaker){
                                                return $oFaker->dateTimeBetween($starDate = 'now', $endDate = 'now');
                                            },
                            'modified' => function () use ($oFaker){
                                                return $oFaker->dateTimeBetween($starDate = 'now', $endDate = 'now');
                                            },
                            'user_id' => function () {
                                                return rand(1, 51);
                                            }
            ]);
            
            $populator->execute();
    }
}
