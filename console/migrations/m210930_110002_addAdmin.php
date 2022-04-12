<?php

use yii\db\Migration;

/**
 * Class m210930_110002_addAdmin
 */
class m210930_110002_addAdmin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('admin');
        $auth->assign($adminRole,1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210930_110002_addAdmin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210930_110002_addAdmin cannot be reverted.\n";

        return false;
    }
    */
}
