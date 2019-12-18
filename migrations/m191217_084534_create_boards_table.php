<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%boards}}`.
 */
class m191217_084534_create_boards_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%boards}}', [
            'id' => $this->primaryKey(),
            'name_boards' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%boards}}');
    }
}
