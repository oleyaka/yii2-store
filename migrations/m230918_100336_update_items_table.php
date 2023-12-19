<?php

use yii\db\Migration;

/**
 * Class m230918_100336_update_items_table
 */
class m230918_100336_update_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    private function randomString($minLength, $maxLength)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = rand($minLength, $maxLength);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    public function safeUp()
    {
        $table = '{{%items}}';

        for ($i = 1; $i <= 400000; $i++) {
            $this->insert($table, [
                'name' => $this->randomString(10, 30),
                'category' => rand(1, 10),
                'price' => rand(1, 10000),
                'currency' => rand(0, 1) ? 'EUR' : 'USD',
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230918_100336_update_items_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230918_100336_update_items_table cannot be reverted.\n";

        return false;
    }
    */
}
