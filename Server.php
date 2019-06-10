<?php 
$RawIp = $_GET['ip'];
$Po = "25565";
$Ip = $RawIp;

// si l'ip contient un port intégré :
if (strpos($RawIp, ':') !== false) {
	// récuperer le port dans $Po
    $wrds = explode(":", $RawIp);
	$Ip = $wrds[0];
	$Po = $wrds[1];
}

//si le modt en "ping" ne ramène rien, le chercher en "query"
$modt = @file_get_contents("https://minecraft-api.com/api/ping/motd.php?ip=".$Ip."&port=".$Po);
$modt = substr($modt, 45);
if ($modt == ""){
	$modt = @file_get_contents("https://minecraft-api.com/api/query/motd.php?ip=".$Ip."&port=".$Po);
	$modt = substr($modt, 63);
}

//si le modt est toujours vide, afficher "MODT Indisponible" car tout les serveurs ne partagent pas leur modt
if ($modt == ""){
	$modt = "MODT Indisponible";
}

//récuperer le reste du contenu a afficher
$currentPlayers =  @file_get_contents("https://minecraft-api.com/api/ping/playeronline.php?ip=".$Ip."&port=".$Po); 
$maxPlayers = 	 @file_get_contents("https://minecraft-api.com/api/ping/maxplayer.php?ip=".$Ip."&port=".$Po); 

$version = @file_get_contents("https://minecraft-api.com/api/ping/version.php?ip=".$Ip."&port=".$Po);

$favicon = @file_get_contents("https://minecraft-api.com/api/ping/favicon.php?ip=".$Ip."&port=".$Po);

$status = file_get_contents("https://minecraft-api.com/api/query/statut.php?ip=".$Ip."&port=".$Po);
//pour certains serveurs ou le query est désactivé le statut est par défaut "hors ligne", meme si le serveur est en ligne
//je le corige plus bas 

if($currentPlayers === false){//si le serveur ne renvoie rien , renvoyer a la page d'érreur

	if (strpos($status, 'Hors ligne') !== false) {//si le status est "hors ligne, renvoyer a la page d'erreur hors ligne"
		include'ServeurHorsLigne.html';
	}else{
		include'ServeurInexistant.html';
	}
		
}else{//sinon continuer

	if (strpos($status, 'Hors ligne') !== false) {
		$status = "En ligne";
	}
	
	include'CurrentServer.php';

}
?>