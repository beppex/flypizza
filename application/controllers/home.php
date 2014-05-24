<?php
class Home extends PublicController 
{
    public function index () 
    {
        $this->template->set_template('flypizza');
        
        $this->template->write('title','Benvenuto');
        $this->template->write_view('content','home_content');
        $this->template->write('footer','Flypizza 1.0');
        $this->template->render();
    }
}