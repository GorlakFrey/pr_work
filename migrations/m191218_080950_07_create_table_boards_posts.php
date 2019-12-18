<?php

use yii\db\Migration;

class m191218_080950_07_create_table_boards_posts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%boards_posts}}', [
            'boards_id' => $this->integer()->notNull(),
            'posts_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%boards_posts}}', ['boards_id', 'posts_id']);
        $this->createIndex('idx-boards_posts-boards_id', '{{%boards_posts}}', 'boards_id');
        $this->createIndex('idx-boards_posts-posts_id', '{{%boards_posts}}', 'posts_id');
        $this->addForeignKey('fk-boards_posts-boards_id', '{{%boards_posts}}', 'boards_id', '{{%boards}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-boards_posts-posts_id', '{{%boards_posts}}', 'posts_id', '{{%posts}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%boards_posts}}');
    }
}
