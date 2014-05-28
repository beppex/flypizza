<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>
            <?php echo $title; ?>
        </title>
        <?php ?>
        <?php ?>
        <style>
            #container {
                width: 100%;
                margin: 0px;
                padding: 0px;
                min-height: 390px;
            }
            
            #header {
                width: 100%;
                height: 197px;
                background-color: #900;
                color: #fff;
                margin: 0px;
                padding: 0px;
            }
            #footer 
            {
                width: 100%;
                height: 20px;
                background-color: #900;
                color: white;
                font-size: 11px;
                padding: 2px;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <img src="http://localhost/fly_pizza/images/logo2.png" />
                <img src="http://localhost/fly_pizza/images/nome2.png" />
            </div>
            <div id="container">
                <?php echo $content; ?>
            </div>
            <div id="footer">FlyPizza 1.0 - Sezione Amministrativa</div>
        </div>
    </body>
</html>