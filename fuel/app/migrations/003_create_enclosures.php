<?php

namespace Fuel\Migrations;

class Create_enclosures
{
	public function up()
	{
		\DBUtil::create_table('enclosures', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar', '0' => true),
			'size' => array('constraint' => 11, 'type' => 'int'),
			'extra' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('enclosures');
	}
}