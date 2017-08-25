<?php

// FONCTIONS DE CONNEXION

function connect()
{
    $bdd="bdhistostages";
    $hote="localhost";
    $login="userHistoStages";
    $mdp="secret";
    // crée la chaîne de connexion mentionnant le type de sgbdr, l'hôte et la base
    $chaineConnexion = 'mysql:host=' . $hote . ';dbname=' . $bdd;
    // crée une instance de PDO (connexion avec le serveur MySql) 
    $unPdo = new PDO($chaineConnexion, $login, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
    // indique que le dialogue se fera en utilisant l'encodage utf-8
    $unPdo->query("SET CHARACTER SET utf8");
    return $unPdo;
}

function selectBase($connexion)
{
   return true;
}

/** 
 * La fonction filtreChaineBD échappe les caractères spéciaux ayant
 * une signification précise pour le serveur MySQL
 * @param string $value : chaîne de caractères à échapper
 * @return string : chaîne de caractères échappée
 */
function filtreChaineBD($value)
{
    // Stripslashes
    if (! get_magic_quotes_gpc()) {
        $value = addslashes($value);
    }

    return $value;
}

// FONCTIONS DE GESTION DES ORGANISATIONS
function obtenirNbOrganisations($connexion)
{
   $req = "select count(*) +1 as nbOrga from organisation";
   $rs = $connexion->query($req);
   $lg = $rs->fetch();;
   return $lg['nbOrga'];
}


function obtenirReqOrganisations()
{
         
   $req="select numero, nom, rue, cp, ville, count(o.numero = s.numeroOrganisation) as nbStages
         from organisation o left join stage s on o.numero = s.numeroOrganisation 
         group by numero, nom, rue, cp, ville
         order by nom";
//   echo '***' . $req . '***<br />';
   return $req;
} 

function obtenirReqAnneesScolaires()
{
   $req="select distinct annee from stage where annee is not null order by annee desc";
   return $req;
}

function obtenirReqDepts()
{
   $req="select numero, nom from dept order by numero";
   return $req;
}

function obtenirDetailOrganisation($connexion, $num)
{
   $req="select * from organisation o left join categorie c on o.idCategorie=c.id where numero=" . $num . "";
   $rs = $connexion->query($req);
   return $rs->fetch();
}

function obtenirReqStages()
{
   $req = "select s.id as idStage, o.nom as nomOrga, e.nom as nomEtud, e.prenom as prenomEtud, concat(year(p.dateFin), if(year( p.dateFin )>2012 or (year(p.dateFin)=2012 and numAnneeForm=1), '-SIO', '-IG'), p.numAnneeForm ) AS anneeStage 
           from stage s inner join (organisation o inner join etudiant e inner join periodeStage p) 
           on (s.numeroOrganisation=o.numero and s.numeroEtudiant=e.numero and idPeriodeStage = p.id) ";
   return $req;
}

function obtenirDetailOrgaStage($connexion, $id)
{
   $req="select o.*, c.libelle as libelleCategorie from stage s inner join organisation o on s.numeroOrganisation=o.numero
         left join categorie c on o.idCategorie=c.id where s.id=" . $id . "";
   $rs = $connexion->query($req);
   return $rs->fetch();;
}

function obtenirDetailRespStage($connexion, $id)
{
   $req="select concat(c1.civilite, ' ', c1.prenom, ' ', c1.nom) as identite, fonction, tel, email 
        from jouerRole j inner join contact c1 on j.idContact=c1.id
        where j.idStage=" . $id  . " and idRole=1";
   $rs = $connexion->query($req);
   return $rs->fetch();
}

function obtenirDetailMaitreStage($connexion, $id)
{
   $req="select concat(c2.civilite, ' ', c2.prenom, ' ', c2.nom) as identite, fonction, tel, email 
        from jouerRole j inner join contact c2 on j.idContact=c2.id
        where j.idStage=" . $id . " and idRole=2";
   $rs = $connexion->query($req);
   return $rs->fetch();
}

function obtenirDetailEtudStage($connexion, $id)
{
   $req="select libelle, theme as motsCles, annee as anneeStage, nom as nomEtud, prenom as prenomEtud 
         from stage s inner join etudiant e on s.numeroEtudiant=e.numero 
         where s.id=" . $id . "";
   $rs = $connexion->query($req);
   return $rs->fetch();
}


function obtenirDetailEtudOrganisation($id)
{

	$req=" select etudiant.nom as nom, etudiant.prenom as prenom ,periodestage.dateDeb,periodestage.dateFin from etudiant,periodestage,stage
where etudiant.numero = stage.numeroEtudiant and stage.idPeriodeStage= periodestage.id
and stage.numeroOrganisation=". $id ."";
	return $req;
	 
}

?>
