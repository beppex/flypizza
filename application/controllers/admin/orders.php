<?php 
class Orders extends AdminController 
{
    public function index () 
    {
        $this->page();
    }
    
    public function page ($offset = 0) 
    {
        $this->load->library('pagination');
        $this->template->set_template('backend');
     
        $query = $this->db->query('SELECT cliente.nominativo, ordine.indirizzo, ordine.orario, ordine.conto, ordine.stato, ordine.idordine '
                                . 'FROM cliente '
                                    . 'INNER JOIN ordine '
                                        . 'ON cliente.idcliente=ordine.idcliente');
        $data['ordini']=$query->result();
        
        $total_rows = $this->db->count_all_results('ordine');

        $per_page = 1;
        $config['base_url'] = site_url('admin/orders/page');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config); 
        $data['pagination'] = $this->pagination->create_links();
        
        $this->template->write('title','I tuoi ordini');
        $this->template->write_view('content','admin/orders_page',$data);
        $this->template->render();
    }
    
    
    public function update_stato ($idordine = NULL) 
    {
        /*
        $this->template->set_template('backend');
        
        $data['idordine']=$idordine;
        $this->template->write('title','Aggiorna gli ordini');
        $this->template->write_view('content','admin/order_update',$data);
        $this->template->render();
        */
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        if($idordine != NULL) 
        {
            $this->db->where('idordine', $idordine);
            $query = $this->db->get('ordine');            
            $ordine = $query->row();
        }
        else 
        {
            $ordine = new stdClass();
            $ordine->idordine = "";
        }        

        $this->form_validation->set_rules('stato', 'Stato', 'required');        

        if($this->form_validation->run() == FALSE) 
        {
            $data['idordine']=$idordine;
            $this->template->write('title','Aggiorna gli ordini');
            $this->template->write_view('content','admin/order_update',$data);
            $this->template->render();
        }
        else 
        {                        
            $ordine = new stdClass();
            $ordine->idordine   = $this->input->post('idordine');
            $ordine->stato   = $this->input->post('stato');
                       
            
            if($ordine->idordine == NULL) 
            {
                $this->db->insert('ordine', $ordine);            
            }
            else 
            {
                $this->db->query("UPDATE ordine SET ordine.stato='$ordine->stato' WHERE ordine.idordine = $ordine->idordine");
                
            }
            
            redirect('admin/orders');
        }        
    }
    
    public function delete ($idordine) 
    {
        $this->db->where('idordine', $idordine);
        $this->db->delete('ordine');
        
        redirect('admin/orders');
    }
}
