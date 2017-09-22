<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widgets`.
 */
class m170920_223947_create_widgets_table extends Migration
{

    public $tableName = '{{%widgets}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'groupId' => $this->integer()->notNull(),
            'presetId' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'status' => $this->integer(1)->notNull()->defaultValue(0)
        ]);

        $this->addForeignKey(
            'fk-widgets__widgets_groups_groupId',
            $this->tableName,
            'groupId',
            'widgets-groups',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-widgets__presets_presetId',
            $this->tableName,
            'presetId',
            'presets',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
