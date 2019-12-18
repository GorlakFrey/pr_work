<?php

use yii\db\Migration;

class m191218_080950_05_create_table_user_boards extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_boards}}', [
            'user_id' => $this->integer()->notNull(),
            'boards_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%user_boards}}', ['user_id', 'boards_id']);
        $this->createIndex('idx-user_boards-user_id', '{{%user_boards}}', 'user_id');
        $this->createIndex('idx-user_boards-boards_id', '{{%user_boards}}', 'boards_id');
        $this->addForeignKey('fk-user_boards-boards_id', '{{%user_boards}}', 'boards_id', '{{%boards}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-user_boards-user_id', '{{%user_boards}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%user_boards}}');
    }
}
