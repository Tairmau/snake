<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application HtAuto (adaptation du cas lafleur)
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoSnake
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=snake';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoAvofourshet = null;


		//online
		/*private static $serveur='mysql:host=avofouafrancis.mysql.db';
		private static $bdd='dbname=avofouafrancis';   		
		private static $user='avofouafrancis' ;    		
		private static $mdp='DSfoijfhsd82sds' ;*/
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoSnake::$monPdo = new PDO(PdoSnake::$serveur.';'.PdoSnake::$bdd, PdoSnake::$user, PdoSnake::$mdp); 
			PdoSnake::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoSnake::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoHtAuto = PdoHtAuto::getPdoHtAuto();
 * @return l'unique objet de la classe PdoHtAuto
 */
	public  static function getPdoSnake()
	{
		if(PdoSnake::$monPdoAvofourshet == null)
		{
			PdoSnake::$monPdoAvofourshet=new PdoSnake();
		}
		return PdoSnake::$monPdoAvofourshet;  
	}


	public function verifconnex($login,$mdp)
	{
		$req = "SELECT COUNT(*) FROM auth WHERE login = '$login' AND mdp = '$mdp';";
		$res = PdoSnake::$monPdo->prepare($req);
		$res->execute();
		$count = $res->fetchColumn();
		
		return $count;
	}

	public function register($nom,$prenom,$login,$mdp)
	{
		$req1 = "INSERT INTO register(nom,prenom,login,mdp) VALUES ('$nom','$prenom','$login','$mdp');";
		$req2 = "INSERT INTO auth(login,mdp) VALUES ('$login','$mdp');";
		$res1 = PdoSnake::$monPdo->prepare($req1);
		$res1->execute();
		$res2 = PdoSnake::$monPdo->prepare($req2);
		$res2->execute();
	}
	public function afficherScores()
	{
		$req = "SELECT identifiant,scores from allscores ORDER BY scores DESC;";
		$res = PdoSnake::$monPdo->prepare($req);
		$res->execute();
		$leslignes = $res->fetchall();

		return $leslignes;
	}

	public function defaultscore($login)
	{
		$req = "INSERT INTO allscores(identifiant,scores) VALUES ('$login',0);";
		$res = PdoSnake::$monPdo->prepare($req);
		$res->execute();
	}
	public function updatescore($login,$score)
	{
		$req = "UPDATE allscores SET scores = '$score' WHERE identifiant = '$login';";
		$res = PdoSnake::$monPdo->prepare($req);
		$res->execute();
	}
}

?>
