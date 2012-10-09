<?php
use Orm\Model;

class Model_Tour extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'tour_guide_id',
		'created_at',
		'updated_at',
	);
	
	protected static $_many_many = array(
		'enclosures' => array(
			'key_from' => 'id',
			'key_through_from' => 'tour_id', // column 1 from the table in between, should match a posts.id
			'table_through' => 'tour_enclosure', // both models plural without prefix in alphabetical order
			'key_through_to' => 'enclosure_id', // column 2 from the table in between, should match a users.id
			'model_to' => 'Model_Enclosure',
			'key_to' => 'id'
			)
		);
	protected static $_belongs_to = array('tourguide' => array(
		'key_from' => 'tour_guide_id'
	));
	
	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('tour_guide_id', 'Tour Guide Id', 'required|valid_string[numeric]');
		return $val;
	}
}
