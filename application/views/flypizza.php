<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <title>
            <?php echo $title; ?>
        </title>
        
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <link href="http://localhost/flypizza/css/pizzastyle.css" rel="stylesheet" type="text/css"/>
        <style>
            #footer 
            {
                width: 100%;
                height: 20px;
                background-color: #900;
                color:white;
            }
        </style>

    </head>
    <body>
        <div id="container">
            <div id="header">
                <img src="http://localhost/flypizza/images/logo2.png" />
                <img src="http://localhost/flypizza/images/nome2.png" />
                
                <div id="horizmenu">
                    <ul id="menu">
                        <li><a href="homepizza.html">Home</a></li>
                        <li><a href="chisiamo.php">Chi siamo</a></li>
                        <li><a href="contatti.php">Contatti</a></li>
                    </ul>
                        <ul id="login">
                            <li><a href="loginpizza.php">Login</a>
                            <ul><li>
                                    <div id="loginform">
                                        <form action="autentica.php">
                                        Nome Utente:
                                        <input type="text" name="utente" />
                                        Password:
                                        <input type="text" name="password" />
                                        <p>
                                        <input type="submit" value="Effettua Login"/>
                                        </p>
                                    </form>      
                                    </div>
                                    </li>
                            </ul>
                            </li>
                            <li><a href="registrapizza.php">Registrati</a></li>
                        </ul>
                </div>   
            </div>
                
            <div id="content">
                <?php echo $content; ?>
            </div>
            
            <div id="footer">
                <?php echo $footer; ?>
            </div>
        </div>
     
     <script>
       $("ul#login>li>ul").hide();
       $("ul#login>li").hover(function()
       {
            $(this).find("ul").fadeIn(100);
       }, 
       function()
       {
            $(this).find("ul").fadeOut(100);
       }
       );
    </script>
        
    </body>
</html>
