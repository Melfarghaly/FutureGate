<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class pergo extends MX_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		$this->template->set_layout('blank_page');
	}

	public function index(){

		$categories = $this->model->get_category_lists(true);
		if (!empty($categories)) {
			$first_category     = $categories[0]->categories;
			$first_category_url = $first_category[0]->url_slug;
		}

		if (get_option("enable_disable_homepage", 0)) {
			redirect(cn($first_category_url));
		}

		$data = [
			'social_neworks' => $categories
		];
		
		if (isset($first_category_url)) {
			$data['first_category_url'] = $first_category_url;
		}
			$session=$this->session->all_userdata();
            $lang=$session['langCurrent']->code;
	       $url_lang=!empty($_GET['lang']) ? $_GET['lang'] : $lang;
           $con_lang="'".$url_lang."'";
           // $query   = $db->query("SELECT * FROM general_lang_list where code=$lang  LIMIT 1 ");
             $qryd      ="SELECT * FROM general_lang_list where code=".'"'.$url_lang .'"'. " LIMIT 1";
             $queryd    = $this->db->query($qryd);
             $resultset = $queryd->result();
           //var_dump($resultset);
           // die();
            	unset_session('langCurrent');
			    set_session('langCurrent',$resultset[0]);
		$this->template->build('index', $data);
	}

	public function header($display_html = true){
		$data = array(
			'display_html' => $display_html,
			'languages'    => $this->model->fetch("*", LANGUAGE_LIST, "status = 1"),
				'lang_current' => get_lang_code_defaut(),
		);

		if ($display_html) {
			$categories = $this->model->get_category_lists(true);
			$data['all_items'] = $categories;
		}

		$this->load->view('blocks/header', $data);
	}

	public function footer($display_html = true){
		$data = array(
			'display_html' => $display_html,
		
		//	'languages'    => $this->model->fetch("*", LANGUAGE_LIST, "status = 1")
		);
		$this->load->view('blocks/footer', $data);
	}

}