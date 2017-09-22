<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widgets-groups`.
 */
class m170920_223944_create_widgets_groups_table extends Migration
{

    public $tableName = '{{%widgets-groups}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
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
