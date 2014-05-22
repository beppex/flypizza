<?php

class Utenti extends AdminController
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper("users");
    }
    
    /* Questo metodo mostra la lista degli utenti in una tabella
     */
    public function index()
    {
        $this->page();
    }
    
    public function page($offset = 0)
    {
        // creazione pagination
        $this->load->library('pagination');

        $total_rows = $this->db->count_all_results('users');

        // definisco i parametri di inizializzazione del pagination
        $per_page = 5;
        $config['base_url'] = site_url('admin/utenti/page');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 4;

        // inizializzo il pagination
        $this->pagination->initialize($config); 
        $data['pagination'] = $this->pagination->create_links();
        // fine pagination

        $query = $this->db->order_by('nominativo')->get('users', $per_page, $offset);
        $data['utenti'] = $query->result();
        
        $this->show('title', 'Lista utenti');
        $this->show_view('content','admin/utenti_view', $data);
        $this->renderize();
       
    }
    
    public function register()
    {        
        $this->insert();
    }

    public function username_check($str)
    {
        if ($str == 'admin') {
            $this->form_validation->set_message('username_check', 'L\'utente non può avere username = "admin"');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }
    
    public function insert()
    {
        $this->update();
    }
    
    public function edit($id)
    {
        $this->update($id);
    }
    
    public function update($id = NULL)
    {
        if(!$this->can_access()) {
            die("FORBIDDEN ACCESS");
        }
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        if($id != NULL) {
            $this->db->where('id', $id);
            $query = $this->db->get('users');            
            $utente = $query->row();
        }
        else {
            $utente = new stdClass();
            $utente->username = "";
            $utente->nominativo = "";
            $utente->email = "";
        }        

        $this->form_validation->set_rules('username', 'Username', 'trim|callback_username_check|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('nominativo', 'Nominativo', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if($this->form_validation->run() == FALSE) {
            $this->show('title', 'Scheda Utente');
            $this->show_view('content', 'admin/register_view', $utente);
            $this->renderize();
        }
        else {                        
            $utente = new stdClass();
            $utente->username   = $this->input->post('username');
            $utente->password   = $this->input->post('password');
            $utente->nominativo = $this->input->post('nominativo');
            $utente->email      = $this->input->post('email');            
            
            if($id == NULL) {
                $this->db->insert('users', $utente);            
            }
            else {
                $this->db->where('id', $id);
                $this->db->update('users', $utente);
            }
            
            redirect('admin/utenti');
        }        
        
    }
    
    public function delete($id)
    {
        if(!$this->can_access()) {
            die("FORBIDDEN ACCESS");
        }
        
        $this->db->where('id', $id);
        $this->db->delete('users');
        
        redirect('admin/utenti');
    }
    
    public function can_access()
    {
        return can_access($this->my_user);
    }    
}

/*
        CREATE TABLE IF NOT EXISTS `users` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `username` varchar(20) NOT NULL,
          `password` varchar(50) NOT NULL,
          `nominativo` varchar(30) NOT NULL,
          `email` varchar(30) NOT NULL,
          PRIMARY KEY (`id`),
          UNIQUE KEY `username` (`username`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
*/
?>