<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authentication
 *
 * @author beppex
 */
class Administrator extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->login();
    }
    
    public function login()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        
        if($this->form_validation->run() == FALSE) {
            /*$this->template->write('title', 'Login ');
            $this->template->write_view('content', 'admin/login_view');
            $this->template->write('footer', "Utente Anonimo");
            
            $this->template->render();*/
            
            $this->load->view('admin/login_view');           
        }
        else {            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $query = $this->db->where("username", $username)->where("password", $password)->get('users');
            
            if($query->num_rows() == 0) {
                redirect('administrator/login');
            }
            else {
                $utente = $query->row();
                $this->session->set_userdata('utente', $utente);
                redirect('admin/home');
            }
        }        
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        
        redirect('administrator');
    }       
}

?>
