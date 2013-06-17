<?php
class Controller_Default extends Controller_Base {
	public function before() {
		parent::before();
		Lang::load('site.yml', null, null, true);
	}

	public function get_index() {
		$index = View::forge('pages/index');
		$this->template->content = $index;
	}

	public function action_404() {
		return Response::forge(View::forge('pages/404'));
	}
}
