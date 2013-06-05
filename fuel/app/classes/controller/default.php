<?php

/**
 * @package  app
 * @extends  Controller
 */
class Controller_Default extends Controller_Base
{
	public function before() {
		parent::before();

		Lang::load('site.yml', null, null, true);
	}

	public function get_channel() {
		return new Response('<script src="//connect.facebook.net/nl_BE/all.js"></script>');
	}

	public function get_index() {
		$view = View::forge('index.jade');
		$view->text = "Mytext";
		$this->template->content = $view;
	}

	/**
	 * The 404 action for the application.
	 */
	public function action_404() {
		return Response::forge(View::forge('404'));
	}
}
