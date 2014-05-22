<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 	  
        <?php echo $_styles; ?>
        <?php echo $_scripts; ?>
	</head>
   <body>
      <div id="wrapper">
         <div id="header" style="height: 100px; background-color: #ddd">
             <ul class="menu">
                 <li><?php echo anchor("admin/utenti","Utenti") ?></li>
             </ul>
         </div>         
         <div id="container" style="margin: 0 auto; min-height: 400px"><?php echo $content ?></div>         
         <div id="footer" style="height: 50px; background-color: #ddd"><?php echo $footer ?> <?php echo anchor("administrator/logout", 'Login/Logout') ?></div>
      </div>
    </body>
</html>

<?php
/*


    // $this->template->add_css('css/main.css');

    // $this->template->add_js('js/jquery.js');

    // $this->template->set_template('default') oppure $this->template->set_template('public')


    $this->template->write('title',"Titolo definito nel controller");
    $this->template->write_view('content', 'myform', $data);
    $this->template->render();


*/
?>
