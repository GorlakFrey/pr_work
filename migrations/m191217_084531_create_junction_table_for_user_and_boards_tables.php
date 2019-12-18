<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_boards}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%boards}}`
 */
class m191217_084531_create_junction_table_for_user_and_boards_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_boards}}', [
            'user_id' => $this->integer(),
            'boards_id' => $this->integer(),
            'PRIMARY KEY(user_id, boards_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_boards-user_id}}',
            '{{%user_boards}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_boards-user_id}}',
            '{{%user_boards}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `boards_id`
        $this->createIndex(
            '{{%idx-user_boards-boards_id}}',
            '{{%user_boards}}',
            'boards_id'
        );

        // add foreign key for table `{{%boards}}`
        $this->addForeignKey(
            '{{%fk-user_boards-boards_id}}',
            '{{%user_boards}}',
            'boards_id',
            '{{%boards}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_boards-user_id}}',
            '{{%user_boards}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_boards-user_id}}',
            '{{%user_boards}}'
        );

        // drops foreign key for table `{{%boards}}`
        $this->dropForeignKey(
            '{{%fk-user_boards-boards_id}}',
            '{{%user_boards}}'
        );

        // drops index for column `boards_id`
        $this->dropIndex(
            '{{%idx-user_boards-boards_id}}',
            '{{%user_boards}}'
        );

        $this->dropTable('{{%user_boards}}');
    }
}
