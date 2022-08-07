<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class package extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $tb_social_network;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories      = CATEGORIES;
		$this->tb_services        = SERVICES;
		$this->tb_api_providers   = API_PROVIDERS;
		$this->tb_social_network  = SOCIAL_NETWORK_CATEGORIES;
	}

	public function index($cate_url_slug = ""){
		$cate_url_slug = addslashes(trim($cate_url_slug));
		if (get_role('admin')) {
			# code...
			$exists_cate = $this->model->get('*', $this->tb_categories, ['url_slug' => $cate_url_slug]);
		}else{
			$exists_cate = $this->model->get('*', $this->tb_categories, ['url_slug' => $cate_url_slug , 'status' => 1]);
		}

		if(empty($exists_cate)){
			redirect(cn());
		}

		$services_by_cate_id = $this->model->fetch("*", $this->tb_services, ['cate_id' => $exists_cate->id, 'status' => 1], 'price', 'ASC');
		 
      $session=$this->session->all_userdata();
      $lang=$session['langCurrent']->code;
         if($lang=='en'){
            $page_title= $exists_cate->page_title_en;
         }else{
             $page_title= $exists_cate->page_title;
         }
     
      
		$data = array(
			"module"                        => get_class($this),
			"category"                      => $exists_cate,
			"services"                      => $services_by_cate_id,
			"page_title"                    => $exists_cate->page_title,
			"page_title_en"                    => $exists_cate->page_title_en,
			"page_meta_keywords"            => $exists_cate->meta_keywords,
			"page_meta_keywords_en"         => $exists_cate->meta_keywords_en,
			"page_meta_description"         => $exists_cate->meta_description,
			"page_meta_description_en"      => $exists_cate->meta_description_en,
		);
		
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
		$this->template->set_layout('user');
		$this->template->build("index", $data);
	}
	public function addToCart(){
	    		//$id=post('service_id');
	    		$id = $_GET['service_id']; 
	    	//	unset_session('cart_services');
	    		$services_by_cate_id = $this->model->fetch("*", $this->tb_services, ['id' => $id, 'status' => 1]);
	    		$old_que_ans_session =  $this->session->userdata('cart_services');
	    		if(empty($old_que_ans_session)){
	    		    $index=0;
	    		    $old_que_ans_session=[$services_by_cate_id[0]];
	    		    set_session('cart_services',$old_que_ans_session);
	    		}else{
	    		    $index=sizeof($old_que_ans_session);
	    		    $old_que_ans_session[$index]=$services_by_cate_id[0];
	    		    set_session('cart_services',$old_que_ans_session);
	    		}
	    		$old_que_ans_session =  $this->session->userdata('cart_services');
	    		//var_dump($old_que_ans_session);
	    		//die();
	    		 //set_session('cart_services',$services_by_cate_id[0]);
	    	echo $index + 1;
                return $index + 1;

	}

	
}