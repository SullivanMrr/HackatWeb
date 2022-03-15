<?php
namespace App\Service;

use App\Entity\Hackathon;
use App\Entity\Initiation;
use App\Entity\Participant;
use DateTime;
use PDO;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PdoHackatWeb 
{
    private static $monPdo;
    

    /*
    Constructeur utilisé lorsque le service est configuré dans services.yaml
    public function __construct($serveur,$bdd,$user,$mdp) 
    {
        PdoHackatWeb::$monPdo=new PDO($serveur.';'.$bdd,$user,$mdp);
        PdoHackatWeb::$monPdo->query("SET CHARACTER SET utf8");
    }*/

    //autre méthode qui vont exécuter des requêtes sql
    public function __construct() 
    {
        $serveur= 'mysql:host=127.0.0.1:3307';
        $bdd= 'dbname=smarrier_hackathon';
        $user= 'root';
        $mdp=''; 
        PdoHackatWeb::$monPdo=new PDO($serveur.';'.$bdd,$user,$mdp);
        PdoHackatWeb::$monPdo->query("SET CHARACTER SET utf8");
    }


    public function getLesHackathons(){
        $req =  PdoHackatWeb::$monPdo->prepare("select * from  Hackathon");
		$req->execute(); 
		$lesLignes = $req->fetchAll();
		$hackathons = [];
		foreach ($lesLignes as $uneLigne)
		{
		  $hackathons[] = new Hackathon($uneLigne);
		}
        var_dump($hackathons);
		return $hackathons;
    }

    public function getLesVilles(){
    $req =  PdoHackatWeb::$monPdo->prepare("select distinct ville from Hackathon where ville IS NOT NULL GROUP BY ville");
		$req->execute(); 
		$lesVilles = $req->fetchAll();
		$villes = [];
		foreach ($lesVilles as $uneVille)
		{
		  $villes[] = new Hackathon($uneVille);
		}
        var_dump($villes);
		return $villes;
    }

    public function setUser($user){
        
        $req =  PdoHackatWeb::$monPdo->prepare("insert into participant(Nom, Prenom, Mail, Password, dateNaiss, Portfolio, numTel) values(:nom, :prenom, :mail, :password, :dateNaiss, :portfolio, :numTel)");
        $req->bindValue(':nom', $user['nom']);
        $req->bindValue(':prenom', $user['prenom']);
        $req->bindValue(':mail', $user['mail']);
        $req->bindValue(':password', $user['password']);
        $req->bindValue(':dateNaiss', $user['dateNaiss']);
        $req->bindValue(':portfolio', $user['portfolio']);
        $req->bindValue(':numTel', $user['numTel']);
		$req->execute();
    }

    public function setParticiper($user){

      $req =  PdoHackatWeb::$monPdo->prepare("insert into participer(ID_HACKATHON, ID_PARTICIPANT, DATEINSCRIPTION, DESCRIPTION) values(:ID_HACKATHON, :ID_PARTICIPANT, :DATEINSCRIPTION, :DESCRIPTION)");
      $req->bindValue(':ID_HACKATHON', $user['ID_HACKATHON']);
      $req->bindValue(':ID_PARTICIPANT', 1);
      $req->bindValue(':DATEINSCRIPTION', $user['DATEINSCRIPTION']);
      $req->bindValue(':DESCRIPTION', $user['DESCRIPTION']);
      
      $req->execute();
      dump("apres execute");
      dump($req); 

  }


    public function setAtelier($user){
      $req =  PdoHackatWeb::$monPdo->prepare("insert into participer(ID_Participer, Password) values(:mail, :password)");
      $req->bindValue(':mail', $user['mail']);
      $req->bindValue(':password', $user['password']);
      dump($req);
  $req->execute();
  }

    public function getLesAteliersHacka($id){
        $req =  PdoHackatWeb::$monPdo->prepare("select * from evenements Inner join hackathon ON hackathon.ID_hackathon = evenements.ID_HACKATHON where ID_HACKATHON= :id");
		$req->bindValue(':id', $id);
        $req->execute(); 
		$lesLignes = $req->fetchAll();
		$ateliers = [];
		foreach ($lesLignes as $uneLigne)
		{
		  $ateliers[] = new Initiation($uneLigne);
		}
        
		return $ateliers;
    }
}