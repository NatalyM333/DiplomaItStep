<?php

use yii\db\Migration;

/**
 * Class m211001_085403_ProducerTable
 */
class m211001_085403_ProducerTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%producer}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text()->defaultValue('')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211001_085403_ProducerTable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211001_085403_ProducerTable cannot be reverted.\n";

        return false;
    }
    */
}
