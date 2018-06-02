<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contacts`.
 */
class m180602_102016_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'phones' => $this->string(255)->notNull(),
            'emails' => $this->string(255)->notNull(),
            'social_links' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('contacts');
    }
}
