<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m230918_094249_create_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'category' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'currency' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
