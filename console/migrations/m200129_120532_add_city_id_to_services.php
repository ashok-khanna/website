<?php

use yii\db\Migration;

/**
 * Class m200129_120532_add_city_id_to_services
 */
class m200129_120532_add_city_id_to_services extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%services}}', 'city_id', $this->integer()->notNull());
        $this->addForeignKey('FK_services_city', 'services', 'city_id', 'cities', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m200129_120532_add_city_id_to_services cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200129_120532_add_city_id_to_services cannot be reverted.\n";

        return false;
    }
    */
}
