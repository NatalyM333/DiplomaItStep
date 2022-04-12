<?php

use yii\db\Migration;

/**
 * Class m210930_102745_addRole
 */
class m210930_102745_addRole extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('admin'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210930_102745_addRole cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210930_102745_addRole cannot be reverted.\n";

        return false;
    }
    */
}
