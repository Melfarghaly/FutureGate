<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class home extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		if (session('uid')) {
			redirect(cn('statistics'));
		}
	}

	public function index(){
		if (get_option("enable_disable_homepage")) {
			redirect(cn("auth/login"));
		}

		$data = array();
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
		$this->template->set_layout('landing_page');
		$this->template->build('index', $data);
	}
	
}