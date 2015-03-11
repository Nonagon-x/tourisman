<?php defined('BASEPATH') OR exit('No direct script access allowed');
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
 * Tourisman Guide Administration Controller Class
 *
 * @package		Tourisman
 * @subpackage	Guide Module
 * @category	Libraries
 * @author		Chonnarong Hanyawongse
 * @link		http://tourisman.com/user_guide/guide/controllers/guide_admin.html
 */

class Guide_admin extends Partial_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function main()
	{
		$this->data = array();
		$this->load->view('guide_main', $this->data);
	}
}