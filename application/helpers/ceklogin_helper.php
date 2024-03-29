<?php
defined('BASEPATH') or exit('No direct script access allowed');

function ceklogin()
{
	$CI = &get_instance();
	if (!$CI->ion_auth->logged_in()) {
		// redirect them to the login page
		redirect('auth/login', 'refresh');
	} elseif (!$CI->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
	{
		// redirect them to the home page because they must be an administrator to view this
		return show_error('You must be an administrator to view this page.');
	}
}
function ceklogin_staff()
{
	$CI = &get_instance();
	if (!$CI->ion_auth->logged_in()) {
		// redirect them to the login page
		redirect('auth/login', 'refresh');
	} elseif (!$CI->ion_auth->is_staff()) // remove this elseif if you want to enable this for non-admins
	{
		// redirect them to the home page because they must be an administrator to view this
		return show_error('You must be an administrator to view this page.');
	}
}

function ceklogin_members()
{
	$CI = &get_instance();
	if (!$CI->ion_auth->logged_in()) {
		// redirect them to the login page
		redirect('auth/login', 'refresh');
	} elseif (!$CI->ion_auth->is_members()) // remove this elseif if you want to enable this for non-admins
	{
		// redirect them to the home page because they must be an administrator to view this
		return show_error('You must be an administrator to view this page.');
	}
}
