<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher_student}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%teacher}}`
 * - `{{%student}}`
 */
class m191217_085214_create_junction_table_for_teacher_and_student_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher_student}}', [
            'teacher_id' => $this->integer(),
            'student_id' => $this->integer(),
            'PRIMARY KEY(teacher_id, student_id)',
        ]);

        // creates index for column `teacher_id`
        $this->createIndex(
            '{{%idx-teacher_student-teacher_id}}',
            '{{%teacher_student}}',
            'teacher_id'
        );

        // add foreign key for table `{{%teacher}}`
        $this->addForeignKey(
            '{{%fk-teacher_student-teacher_id}}',
            '{{%teacher_student}}',
            'teacher_id',
            '{{%teacher}}',
            'id',
            'CASCADE'
        );

        // creates index for column `student_id`
        $this->createIndex(
            '{{%idx-teacher_student-student_id}}',
            '{{%teacher_student}}',
            'student_id'
        );

        // add foreign key for table `{{%student}}`
        $this->addForeignKey(
            '{{%fk-teacher_student-student_id}}',
            '{{%teacher_student}}',
            'student_id',
            '{{%student}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%teacher}}`
        $this->dropForeignKey(
            '{{%fk-teacher_student-teacher_id}}',
            '{{%teacher_student}}'
        );

        // drops index for column `teacher_id`
        $this->dropIndex(
            '{{%idx-teacher_student-teacher_id}}',
            '{{%teacher_student}}'
        );

        // drops foreign key for table `{{%student}}`
        $this->dropForeignKey(
            '{{%fk-teacher_student-student_id}}',
            '{{%teacher_student}}'
        );

        // drops index for column `student_id`
        $this->dropIndex(
            '{{%idx-teacher_student-student_id}}',
            '{{%teacher_student}}'
        );

        $this->dropTable('{{%teacher_student}}');
    }
}
