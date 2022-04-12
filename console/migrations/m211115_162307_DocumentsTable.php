<?php

use yii\db\Migration;

/**
 * Class m211115_162307_DocumentsTable
 */
class m211115_162307_DocumentsTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%documents}}', [
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
       

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211115_162307_DocumentsTable cannot be reverted.\n";

        return false;
    }
    */
}
