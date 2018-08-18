<?php

use yii\db\Migration;

/**
 * Class m180817_153654_booksrubrics
 */
class m180817_153654_booksrubrics extends Migration
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
        echo "m180817_153654_booksrubrics cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('booksrubrics',[
           'id'=>$this->primaryKey(),
           'id_books'=>$this->smallInteger(8),
           'id_rubrics'=>$this->smallInteger(8)
        ]);

        $this->alterColumn('booksrubrics','id',$this->smallInteger(8).'NOT NULL AUTO_INCREMENT');

        $this->addForeignKey(
          'chain_to_books',
          'booksrubrics',
          'id_books',
          'books',
          'id',
          'CASCADE'
        );

        $this->addForeignKey(
            'chain_to_rubrics',
            'booksrubrics',
            'id_rubrics',
            'rubrics',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m180817_153654_booksrubrics cannot be reverted.\n";

        return false;
    }

}
