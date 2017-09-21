<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widgets`.
 */
class m170920_224711_create_widgets_table extends Migration
{

    public $tableName = '{{%widgets}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'groupId' => $this->integer()->defaultValue(0),
            'presetId' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'status' => $this->integer(1)->notNull()->defaultValue(0)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->tableName);
    }
}
