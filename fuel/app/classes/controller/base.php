<?php
class Controller_Base extends Controller_Template {
	public $template = 'template';

	public function before() {
		parent::before();
		$this->set_lang($this->param('lang'));
	}

	protected function set_lang($param_lang) {
		if(!$param_lang) {
			return;
		}

		if(!$this->lang_exists($param_lang)) {
			Response::redirect('nl-BE');
		}

		switch($param_lang) {
			case 'fr-BE':
				setlocale(LC_ALL, 'french,fr_FR');

				break;
		}
		Config::set('language', $param_lang);
	}

	protected function lang_exists($lang) {
		return is_dir(APPPATH . '/lang/' . $lang);
	}
}
