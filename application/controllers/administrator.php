<?php

class Administrator extends CI_Controller
{
    public function index()
    {
        $this->login();
    }
    
    public function login()
    {
        $this->load->library('form_validation');
        $this->template->set_template('backend');
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->write('title','Benvenuto in FlyPizza');
            $this->template->write_view('content','administrator_index');
            $this->template->render();
        }
        else
        {            
            $username = $this->input->post('username');
           
            $this->session->set_userdata('session_id', $username);
            redirect('admin/orders/page');
            
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        
        redirect('administrator');
    }
    
    
    
    public function password_check ($str) 
    {
        if ($str == 'admin')
        {
                return TRUE;
        }
        else
        {
                return FALSE;
        }
    }   
 
}
