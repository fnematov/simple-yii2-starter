<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscribers`.
 * Has foreign keys to the tables:
 *
 * - `article_categories`
 */
class m180602_101115_create_subscribers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscribers', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255)->notNull(),
            'category_id' => $this->integer(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-subscribers-category_id',
            'subscribers',
            'category_id'
        );

        // add foreign key for table `article_categories`
        $this->addForeignKey(
            'fk-subscribers-category_id',
            'subscribers',
            'category_id',
            'article_categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `article_categories`
        $this->dropForeignKey(
            'fk-subscribers-category_id',
            'subscribers'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-subscribers-category_id',
            'subscribers'
        );

        $this->dropTable('subscribers');
    }
}
