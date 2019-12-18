<?php

use yii\db\Migration;

class m191218_080950_01_create_table_boards extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%boards}}', [
            'id' => $this->primaryKey(),
            'name_boards' => $this->text(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%boards}}');
    }
}
