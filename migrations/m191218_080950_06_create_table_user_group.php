<?php

use yii\db\Migration;

class m191218_080950_06_create_table_user_group extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_group}}', [
            'user_id' => $this->integer()->notNull(),
            'group_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%user_group}}', ['user_id', 'group_id']);
        $this->createIndex('idx-user_group-user_id', '{{%user_group}}', 'user_id');
        $this->createIndex('idx-user_group-group_id', '{{%user_group}}', 'group_id');
        $this->addForeignKey('fk-user_group-group_id', '{{%user_group}}', 'group_id', '{{%group}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-user_group-user_id', '{{%user_group}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%user_group}}');
    }
}
