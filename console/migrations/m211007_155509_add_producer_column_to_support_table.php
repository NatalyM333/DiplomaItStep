<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%support}}`.
 */
class m211007_155509_add_producer_column_to_support_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%support}}', 'producer_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%support}}', 'produser_id');
    }
}
