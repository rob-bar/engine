<?php

namespace Fuel\Migrations;

class Create_visitors
{
	public function up()
	{
		\DBUtil::create_table('visitors', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar', '0' => true),
			'email' => array('constraint' => 255, 'type' => 'varchar', '0' => true),
			'tour_guide_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('visitors');
	}
}