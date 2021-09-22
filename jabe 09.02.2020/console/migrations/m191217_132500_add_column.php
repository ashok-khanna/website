<?php

use yii\db\Migration;

/**
 * Class m191217_132500_add_column
 */
class m191217_132500_add_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%service_category}}', 'is_popular', $this->integer(1)->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        // echo "m191217_132500_add_column cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191217_132500_add_column cannot be reverted.\n";

        return false;
    }
    */
}
