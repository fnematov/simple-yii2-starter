<?php

use yii\db\Migration;

/**
 * Handles the creation of table `articles`.
 * Has foreign keys to the tables:
 *
 * - `article_categories`
 */
class m180602_100239_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'image' => $this->string(255),
            'status' => $this->smallInteger()->defaultValue(10),
            'main_status' => $this->smallInteger(),
            'category_id' => $this->integer()->notNull(),
            'tags' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'view_count' => $this->integer(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-articles-category_id',
            'articles',
            'category_id'
        );

        // add foreign key for table `article_categories`
        $this->addForeignKey(
            'fk-articles-category_id',
            'articles',
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
            'fk-articles-category_id',
            'articles'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-articles-category_id',
            'articles'
        );

        $this->dropTable('articles');
    }
}
