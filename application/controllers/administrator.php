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
        $this->template->set_template('default');
        
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
            redirect('administrator/orders_page');
            
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        
        redirect('administrator');
    }
    
    public function update_stato () {}
    
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
    
    public function orders_page ($offset = 0) 
    {
        $this->load->library('pagination');
        
        $query = $this->db->query('SELECT cliente.nominativo, ordine.indirizzo, ordine.orario, ordine.conto, ordine.stato '
                                . 'FROM cliente '
                                    . 'INNER JOIN ordine '
                                        . 'ON cliente.idcliente=ordine.idcliente');
        $data['ordini']=$query->result();
        
        $total_rows = $this->db->count_all_results('ordine');

        $per_page = 1;
        $config['base_url'] = site_url('administrator/orders_page');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config); 
        $data['pagination'] = $this->pagination->create_links();
        
        $this->template->write('title','I tuoi ordini');
        $this->template->write_view('content','administrator_orders_page',$data);
        $this->template->render();
    }
    
}
