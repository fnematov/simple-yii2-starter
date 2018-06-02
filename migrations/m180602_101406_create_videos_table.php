<?php

use yii\db\Migration;

/**
 * Handles the creation of table `videos`.
 * Has foreign keys to the tables:
 *
 * - `article_categories`
 */
class m180602_101406_create_videos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('videos', [
            'id' => $this->primaryKey(),
            'source' => $this->string()->notNull(),
            'category_id' => $this->integer(),
            'status' => $this->smallInteger()->defaultValue(10),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-videos-category_id',
            'videos',
            'category_id'
        );

        // add foreign key for table `article_categories`
        $this->addForeignKey(
            'fk-videos-category_id',
            'videos',
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
            'fk-videos-category_id',
            'videos'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-videos-category_id',
            'videos'
        );

        $this->dropTable('videos');
    }
}
