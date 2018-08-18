<?php

use yii\db\Migration;

/**
 * Class m180817_152252_books
 */
class m180817_152252_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180817_152252_books cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('books',[
           'id'=>$this->primaryKey(),
           'name'=>$this->string(200),
            'author'=>$this->string(32),
            'data'=>$this->date('Y-m-d'),
            'ISBN'=>$this->integer(55)
        ]);
        $this->alterColumn('books','id',$this->smallInteger(8).'NOT NULL AUTO_INCREMENT');
    }

    public function down()
    {
        echo "m180817_152252_books cannot be reverted.\n";

        return false;
    }

}
