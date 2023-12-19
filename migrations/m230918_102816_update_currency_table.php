<?php

use yii\db\Migration;

/**
 * Class m230918_102816_update_currency_table
 */
class m230918_102816_update_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = '{{%currency}}';
        $startDate = strtotime('2022-01-01');
        $endDate = strtotime('2023-07-01');

        while ($startDate <= $endDate) {
            $this->insert($table, [
                'date' => date('Y-m-d', $startDate),
                'currency' => 'EUR',
                'value' => rand(10, 100),
            ]);

            $this->insert($table, [
                'date' => date('Y-m-d', $startDate),
                'currency' => 'USD',
                'value' => rand(10, 100),
            ]);

            $startDate = strtotime('+1 day', $startDate);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230918_102816_update_currency_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230918_102816_update_currency_table cannot be reverted.\n";

        return false;
    }
    */
}
