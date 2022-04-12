<?php

use yii\db\Migration;

/**
 * Class m211001_163524_LiftTable
 */
class m211001_163524_LiftTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lift}}', [
            'id' => $this->primaryKey(),
            'description'=>$this->text()->defaultValue(''), 
            'url_image'=> 'json',      
            'type_id'=>$this->integer()->notNull(),
            'producer_id'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('lift');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211001_163524_LiftTable cannot be reverted.\n";

        return false;
    }
    */
}
