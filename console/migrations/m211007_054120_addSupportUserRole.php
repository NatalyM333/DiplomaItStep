<?php

use yii\db\Migration;

/**
 * Class m211007_054120_addSupportUserRole
 */
class m211007_054120_addSupportUserRole extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $auth->add($auth->createRole('support'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211007_054120_addSupportUserRole cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211007_054120_addSupportUserRole cannot be reverted.\n";

        return false;
    }
    */
}
