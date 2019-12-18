<?php

use yii\db\Migration;

class m191218_080950_03_create_table_posts extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%posts}}', [
            'id' => $this->primaryKey(),
            'name_posts' => $this->text(),
            'description' => $this->text(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%posts}}');
    }
}
