<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Tourisman
 *
 * An Open Source Tourism Management System for PHP 5.1.6 or newer
 *
 * @package		Tourisman
 * @author		Chonnarong Hanyawongse
 * @copyright	Copyright (c) 2008 - 2015, Nonagon, Ltd.
 * @license		http://tourisman.com/user_guide/license.html
 * @link		http://tourisman.com
 * @since		Version 0.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Tourisman Admin Controller Class
 *
 * @package		Tourisman
 * @subpackage	Admin Module
 * @category	Libraries
 * @author		Chonnarong Hanyawongse
 * @link		http://tourisman.com/user_guide/admin/admin_controllers.html
 */

class Admin extends Admin_Controller {

    function __construct()
    {
	    $this->load->library('user/ion_auth');
	    
        parent::__construct();
        
        $user = $this->ion_auth->user()->row();
        
        $this->data['current_user'] = $user->id;
        
        $display_name = $user->first_name . ' ' . $user->last_name;
        if(!trim($display_name)) $display_name = $user->username;
        
        $this->data['current_display_name'] = $display_name;
        $this->data['menu_items'] = $this->read_module_menu_items();
        
        $this->lang->load('general');
        
        define('MAIN_CONTROLLER', TRUE);
    }

	protected function authenticate()
	{
		return $this->ion_auth->is_admin();
	}

	public function index($sub_module = null, $section = null)
	{
		$this->load->model("setting/setting_model");
		if(!$this->setting_model->is_any_entry() && $sub_module != "setting")
		{
			redirect(base_url("admin/setting/general"));
			return;
		}
		
		if($sub_module == null)
		{
			$this->data['sub_content'] = $this->load->view('subs/home', $this->data, TRUE);
			$this->load->templated_view('admin_base', 'main', $this->data);
		}
		else
		{
			$path = sprintf('%s/%s_admin/%s', $sub_module, $sub_module, $section);
			
			$this->data['sub_content'] = Modules::run($path);
			$this->load->templated_view('admin_base', 'main', $this->data);
		}
	}
	
	public function _remap($method, $args)
	{
		if($method == "index")
		{
			$this->index();
		}
		else
		{
			$section = null;
			if(isset($args) && isset($args[0]))
				$section = $args[0];
			
			$this->index($method, $section);
		}
	}
}