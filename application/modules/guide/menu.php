<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$module_menu_header = lang('guide_menu_header');

$module_menu_items = array(

	array(
		'icon' => 'money',
		'path' => 'admin/guide/main',
		'name' => lang('guide_menu_main'),
		'link' => base_url('admin/guide/main')
	),

	array(
		'icon' => 'user',
		'path' => 'admin/guide/person',
		'name' => lang('guide_menu_person'),
		'link' => base_url('admin/guide/person')
	)
);