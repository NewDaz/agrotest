<?php

use yii\db\Migration;

/**
 * Class m180817_152323_rubrics
 */
class m180817_152323_rubrics extends Migration
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
        echo "m180817_152323_rubrics cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('rubrics',[
            'id'=>$this->PrimaryKey(),
            'name'=>$this->string(32)
            ]);
        $this->alterColumn('rubrics','id',$this->smallInteger(8).'NOT NULL AUTO_INCREMENT');
    }

    public function down()
    {
        echo "m180817_152323_rubrics cannot be reverted.\n";

        return false;
    }

}
