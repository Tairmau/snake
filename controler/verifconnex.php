<?php
    $action = $_REQUEST['action'];
    $pdo = PdoSnake::getPdoSnake();
    
    session_start();
    
    switch($action)
    {
        case 'verifconnex':
            {
                $login = $_POST['login'];
                $mdp = $_POST['mdp'];
                $count = $pdo->verifconnex($login, $mdp);
        
                if ($count == 1) {
                    $_SESSION['login'] = $login;
                    header('Location: index.php?uc=connexionbonne&bn=accueil');
                    echo $login;
                    exit();
                } else {
                    header('Location: index.php?uc=accueil'); // Ajoutez un paramètre error pour afficher un message d'erreur
                    exit();
                }
                break;
            }
        
        case 'register':
            {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $login = $_POST['login'];
                $mdp = $_POST['mdp'];
                if (strlen($login) > 10) {
                    // Gérer l'erreur, par exemple en redirigeant avec un message d'erreur
                    echo'pseudo trop long';
                    header('Location: index.php?uc=registerform');
                    exit();
                }
                else
                {
                    $register = $pdo->register($nom,$prenom,$login,$mdp);
                    $defaultscore = $pdo->defaultscore($login);
                    header('Location: index.php?uc=accueil');
                }

                break;
            }
        case 'updatescore':
            {
                $login = $_SESSION['login'];
                $score = $_COOKIE['score'];
                $updatescore = $pdo->updatescore($login,$score);
                

                if(isset($_SESSION['login']))
                {
                    header('Location: index.php?uc=connexionbonne&bn=accueil');
                }
                else
                {
                    header('Location: index.php?uc=accueil');
                }
                break;
            }
        case 'deconnexion':
            {
                session_destroy();
                header('Location: index.php?uc=accueil');
                break;
            }

        

    }

?>