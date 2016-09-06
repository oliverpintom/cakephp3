<?php
use Migrations\AbstractMigration;

class CreateBookMarks extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('book_marks');
        $table->addColumn('title', 'string', [
            'default' => null,
            'limit' => 150,
            'null' => false,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('url', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
        
        
        $reftable = $this->table("book_marks");
        $reftable->addColumn("user_id", "integer",array("signed" => "disable"))
                    ->addForeignKey("user_id","users","id",array('delete' => 'CASCADE' , 'update' => 'NO_ACTION'))
                    ->update();
    }
}
