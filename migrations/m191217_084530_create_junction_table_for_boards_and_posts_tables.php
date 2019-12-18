<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%boards_posts}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%boards}}`
 * - `{{%posts}}`
 */
class m191217_084530_create_junction_table_for_boards_and_posts_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%boards_posts}}', [
            'boards_id' => $this->integer(),
            'posts_id' => $this->integer(),
            'PRIMARY KEY(boards_id, posts_id)',
        ]);

        // creates index for column `boards_id`
        $this->createIndex(
            '{{%idx-boards_posts-boards_id}}',
            '{{%boards_posts}}',
            'boards_id'
        );

        // add foreign key for table `{{%boards}}`
        $this->addForeignKey(
            '{{%fk-boards_posts-boards_id}}',
            '{{%boards_posts}}',
            'boards_id',
            '{{%boards}}',
            'id',
            'CASCADE'
        );

        // creates index for column `posts_id`
        $this->createIndex(
            '{{%idx-boards_posts-posts_id}}',
            '{{%boards_posts}}',
            'posts_id'
        );

        // add foreign key for table `{{%posts}}`
        $this->addForeignKey(
            '{{%fk-boards_posts-posts_id}}',
            '{{%boards_posts}}',
            'posts_id',
            '{{%posts}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%boards}}`
        $this->dropForeignKey(
            '{{%fk-boards_posts-boards_id}}',
            '{{%boards_posts}}'
        );

        // drops index for column `boards_id`
        $this->dropIndex(
            '{{%idx-boards_posts-boards_id}}',
            '{{%boards_posts}}'
        );

        // drops foreign key for table `{{%posts}}`
        $this->dropForeignKey(
            '{{%fk-boards_posts-posts_id}}',
            '{{%boards_posts}}'
        );

        // drops index for column `posts_id`
        $this->dropIndex(
            '{{%idx-boards_posts-posts_id}}',
            '{{%boards_posts}}'
        );

        $this->dropTable('{{%boards_posts}}');
    }
}
