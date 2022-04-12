<?php

use yii\db\Migration;

/**
 * Class m211001_063422_TypesTable
 */
class m211001_063422_TypesTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->defaultValue(''),
            'url_image'=> 'json', 
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211001_063422_TypesTable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211001_063422_TypesTable cannot be reverted.\n";

        return false;
    }
    */
}
