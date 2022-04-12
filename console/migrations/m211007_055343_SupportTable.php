<?php

use yii\db\Migration;

/**
 * Class m211007_055343_SupportTable
 */
class m211007_055343_SupportTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%support}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->defaultValue(''),
            'url_file'=> 'json', 
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211007_055343_SupportTable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211007_055343_SupportTable cannot be reverted.\n";

        return false;
    }
    */
}
