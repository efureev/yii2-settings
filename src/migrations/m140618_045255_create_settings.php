<?php
/**
 * @link      http://phe.me
 * @copyright Copyright (c) 2014 Pheme
 * @license   MIT http://opensource.org/licenses/MIT
 */

use yii\db\Schema;

/**
 * @author Aris Karageorgos <aris@phe.me>
 */
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
				'id' => Schema::TYPE_PK,
				'type' => Schema::TYPE_STRING,
				'section' => Schema::TYPE_STRING,
				'key' => Schema::TYPE_STRING,
				'value' => Schema::TYPE_TEXT,
				'active' => Schema::TYPE_BOOLEAN,
				'created' => Schema::TYPE_DATETIME,
				'modified' => Schema::TYPE_DATETIME,
			],$tableOptions
		);
	}

	public function down()
	{
		$this->dropTable('{{%settings}}');
	}
}
