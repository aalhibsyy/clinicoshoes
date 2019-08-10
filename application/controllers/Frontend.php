<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Frontend_model', 'fm');
        $this->load->library('M_db');
    }

    public function index()
    {
        //$this->load->view('welcome_message');
        $data['datarating'] = $this->fm->testimoni();
        $this->template->load('template/frontend/home', 'frontend/home',$data);
    }

}
