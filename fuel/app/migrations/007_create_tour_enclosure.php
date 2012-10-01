<?php

namespace Fuel\Migrations;

class Create_tour_enclosure
{
	public function up()
	{
		\DBUtil::create_table('tour_enclosure', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'tour_id' => array('constraint' => 11, 'type' => 'int'),
			'enclosure_id' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tour_enclosure');
	}
}