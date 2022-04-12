<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%producer}}`.
 */
class m211007_162554_add_url_image_column_to_producer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%producer}}', 'url_image', $this->json());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%producer}}', 'url_image');
    }
}
