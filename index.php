<?php
    session_start();

    //include("vues/accueil.php");

    require_once("util/class.PDO.Snake.inc.php");
    $pdo = PdoSnake::getPdoSnake();
    
    if(!isset($_REQUEST['uc']))
        $uc = 'accueil';
    else
        $uc = $_REQUEST['uc'];
    
    
    switch($uc){

        case 'accueil':
            {
                include('controler/verifconnex.php');
                include('view/game.php');
                include('view/login.php');
                include('view/scores.php');
                include('view/footer.php');
                break;
                
            }
        case 'registerform':
            {
                include('controler/verifconnex.php');
                include('view/game.php');
                include('view/register.php');
                include('view/scores.php');
                include('view/footer.php');
                break;
            }
        case 'connexionbonne':
            {
                if(!isset($_REQUEST['bn']))
                    $bn = 'accueil';
                else
                    $bn = $_REQUEST['bn'];
                
                
                switch($bn){
                    case 'accueil':
                        {
                            include('controler/verifconnex.php');
                            include('view/game.php');
                            include('view/deconnexion.php');
                            include('view/scores.php');
                            include('view/footer.php');
                            break;
                            
                        }

                }
            }
    }

?>