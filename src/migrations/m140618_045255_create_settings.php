<?php

class m140618_045255_create_settings extends \yii\db\Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable(
			'{{%settings}}',
			[
                'id' => $this->primaryKey(),
                'type' => $this->string(255)->notNull(),
                'section' => $this->string(255)->notNull(),
                'key' => $this->string(255)->notNull(),
                'value' => $this->text(),
                'active' => $this->boolean(),
                'created' => $this->dateTime(),
                'modified' => $this->dateTime(),
			],$tableOptions
		);

        $this->createIndex('settings_unique_key_section', '{{%settings}}', ['section', 'key'], true);
	}

	public function down()
	{
        $this->dropIndex('settings_unique_key_section', '{{%settings}}');
		$this->dropTable('{{%settings}}');
	}
}
