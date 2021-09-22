<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%criteria_service}}`.
 */
class m191107_122120_create_criteria_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%services}}', 'prepayment', $this->integer(1)->defaultValue(0));       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%services}}', 'prepayment');
    }
}
