<?php

use yii\db\Migration;

/**
 * Class m211007_053842_addUserRole
 */
class m211007_053842_addUserRole extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('user'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211007_053842_addUserRole cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211007_053842_addUserRole cannot be reverted.\n";

        return false;
    }
    */
}
