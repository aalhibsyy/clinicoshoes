<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend_model extends CI_Model
{	
    function __construct()
    {
    	parent::__construct(); 
    	
    }

    function testimoni()
    {
    	$sql = " SELECT *
				FROM rating a
				JOIN users b
				ON a.id_users=b.id
				 ";
				 return $this->db->query($sql);
    }
	
}