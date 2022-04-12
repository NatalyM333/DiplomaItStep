<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%type}}`.
 */
class m211006_054421_add_url_image_column_to_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%types}}', 'url_image', $this->json());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // $this->dropColumn('{{%type}}', 'url_image');
    }
}
