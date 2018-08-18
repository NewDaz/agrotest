<?php

use yii\db\Migration;

/**
 * Class m180818_155039_user
 */
class m180818_155039_user extends Migration
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
        echo "m180818_155039_user cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('user',[
            'id'=>$this->PrimaryKey(),
            'username'=>$this->string(32),
            'password'=>$this->string(32),
            'auth_key'=>$this->string(32),
            'access_toke'=>$this->string(32)
        ]);
        $this->alterColumn('user','id',$this->smallInteger(8).'NOT NULL AUTO_INCREMENT');
    }

    public function down()
    {
        echo "m180818_155039_user cannot be reverted.\n";

        return false;
    }

}
