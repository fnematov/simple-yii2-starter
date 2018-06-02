<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_posts`.
 * Has foreign keys to the tables:
 *
 * - `articles`
 * - `user`
 * - `article_posts`
 */
class m180602_100455_create_article_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_posts', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'sender_id' => $this->integer()->notNull(),
            'post' => $this->text()->notNull(),
            'answer_to' => $this->integer(),
            'posted_at' => $this->integer(),
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            'idx-article_posts-article_id',
            'article_posts',
            'article_id'
        );

        // add foreign key for table `articles`
        $this->addForeignKey(
            'fk-article_posts-article_id',
            'article_posts',
            'article_id',
            'articles',
            'id',
            'CASCADE'
        );

        // creates index for column `sender_id`
        $this->createIndex(
            'idx-article_posts-sender_id',
            'article_posts',
            'sender_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-article_posts-sender_id',
            'article_posts',
            'sender_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `answer_to`
        $this->createIndex(
            'idx-article_posts-answer_to',
            'article_posts',
            'answer_to'
        );

        // add foreign key for table `article_posts`
        $this->addForeignKey(
            'fk-article_posts-answer_to',
            'article_posts',
            'answer_to',
            'article_posts',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `articles`
        $this->dropForeignKey(
            'fk-article_posts-article_id',
            'article_posts'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            'idx-article_posts-article_id',
            'article_posts'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-article_posts-sender_id',
            'article_posts'
        );

        // drops index for column `sender_id`
        $this->dropIndex(
            'idx-article_posts-sender_id',
            'article_posts'
        );

        // drops foreign key for table `article_posts`
        $this->dropForeignKey(
            'fk-article_posts-answer_to',
            'article_posts'
        );

        // drops index for column `answer_to`
        $this->dropIndex(
            'idx-article_posts-answer_to',
            'article_posts'
        );

        $this->dropTable('article_posts');
    }
}
