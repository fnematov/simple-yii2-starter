<?php

use yii\db\Migration;

/**
 * Handles the creation of table `about_us`.
 */
class m180602_102314_create_about_us_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('about_us', [
            'id' => $this->primaryKey(),
            'short_content' => $this->text(),
            'content' => $this->text(),
            'image' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('about_us');
    }
}
