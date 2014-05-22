<?php

class BaseController extends CI_Controller
{
    public $my_user;
    
    public function __construct() 
    {
        parent::__construct();
        
        $this->my_user = $this->session->userdata('utente');                
    }
}

class PublicController extends BaseController
{
    
}

class AdminController extends BaseController
{
    public function __construct() 
    {
        parent::__construct();

        if($this->my_user == FALSE) {
            redirect('administrator/login');
        }
        
        $this->template->set_template("admin");
    }    
    
    public function show($region, $stringa)
    {
        $this->template->write($region, $stringa);
    }
    
    public function show_view($region, $view, $data = NULL)
    {
        $this->template->write_view($region, $view, $data);
    }
    
    public function renderize()
    {
        $this->template->write('footer', "Benvenuto ". $this->my_user->nominativo);
        
        $this->template->add_css("css/stylesheet.css");
        $this->template->render();
    }
        
}
?>
