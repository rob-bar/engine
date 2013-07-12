<?php
  
class Controller_Base extends Controller_Template
{
  public $template = 'template';
  public $data = array();
  public $lang = 'nl-BE';

  public function before() {
    parent::before();

    $this->set_lang($this->param('lang'));
    $this->template = View::forge('template');
  }

  protected function set_lang($param_lang) {
    if(!$param_lang) {
      if(array_key_exists('signed_request',$_REQUEST)) {
        $signed_request = $_REQUEST['signed_request'];

        if($signed_request != null) {
          $parsedReq = FacebookHelpers::parse_signed_request($signed_request,config::get('app_secret'));

          if($parsedReq['user']['locale'] != null && substr($parsedReq['user']['locale'], 0,2) == 'fr') {
            $param_lang = 'fr-BE';
          }
        }
      }
    }
   
    if(!$this->lang_exists($param_lang)) {
      Response::redirect('nl-BE');
    }

    switch($param_lang) {
      case 'nl-BE':
        setlocale(LC_ALL, array('dutch,nl_NL'));
        break;
      case 'fr-BE':
        setlocale(LC_ALL, array('french,fr_FR'));
        break;
    }

    Config::set('language', $param_lang);
    $this->lang = $param_lang;
  }

  protected function lang_exists($lang) {
    return is_dir(APPPATH . '/lang/' . $lang);
  }

  protected function redirect_to_lang($lang = 'nl-BE') {
    $this->redirect_to_session_lang();

    Response::redirect($lang);
  }

  protected function redirect_to_session_lang() {
    if(Session::get('language') && $this->lang_exists(Session::get('language'))) {
      Response::redirect(Session::get('language'));
    }
  }
}