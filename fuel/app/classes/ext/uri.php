<?php
class Uri extends \Fuel\Core\Uri {
	public static function _init() { 
		// \Debug::dump('MY Uri IS ALIVE!'); 
	}
	
	public static function page(){
		$segs = \Uri::segments();
		$page = end($segs);
		return $page;
	}
}
?>

