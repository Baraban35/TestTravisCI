<!DOCTYPE html>
<html style="height: 100%;" class=" js csstransforms csstransforms3d" lang="fr">
<head>
<meta charset="utf-8">
<title>Site intranet de la section STS IG-SIO</title>
<meta name="robots" content="NOINDEX" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet"> 
<link rel="stylesheet" href="font/css/font-awesome.min.css"> 
<link rel="stylesheet" href="css/tablesorter.css">

<style>  
input[name=page], select[name=page] {
width:110px;
}
td[class=center], ul[id=center], a[id=center], a[title=Accueil] {
text-align:center;
}
td[class=intitule] {
width:35px; 
}
legend {
font-size:14px;
font-weight:bold;
}
label {
display: block;
width: 135px;
float: left;
}
button {
width:75px;
}
td[class=domaine] {
font-weight:bold;
text-decoration:underline;
text-indent:20px;
background-color:#E0E0E0;
}
div[id=contenu] {
padding-bottom:60px;
} 
th.nomenclature {
width:85px;
}
</style>

<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>

<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
     
      <a class="brand hidden-phone" title="Accueil" href="accueil.php"><i class="fa fa-home fa-1x"></i> <br>  Lycée VHB - BTS-SIO</a> 

    </div> 
  </div> 
</div>
          
  
    <div id="entete" class="row">
    <div class="span11 offset1"><h2> Site Intranet de la section STS IG - SIO. </h2> </div> </div> 
      
      <img class="span1 hidden-phone" src="basch.jpg" alt="logo" /> 
		<div class="span11" id="contenu"> 
		 <?php 
                 $page = "adressesSites";
                 if ( isset($_GET["page"])) { // paramètre page renseignée dans l'url
                     $listePages = array("activitesP1", "activitesP2", 
                                        "activitesP3", "activitesP4", "activitesP5", 
                                        "adressesSites", "detailOrganisation", 
                                        "detailStage", "listeOrganisations", 
                                        "rechercheStagesCriteres", "resultatsRechercheStages");
                     // contrôle de la valeur de la page reçue
                     if ( in_array($_GET["page"], $listePages) ) {
                          $page = $_GET["page"];
                     }
                 }
                 include('./histo/'.$page.'.php'); 
                 // $page = (isset($_GET["page"])) ? $_GET["page"] : 'adressesSites' ; ?>  
<!--  -->
<div class="navbar navbar-fixed-bottom">
  <div class="navbar-inner">
    <div class="container">
    <a class="brand hidden-phone" >Activités</a>
      <div class="nav span7">
        <ul class="nav pull-left">
      <li class="divider-vertical"></li>
	  <li> <a title="Activités P1" href="?page=activitesP1"> P1</a></li>
	  <li class="divider-vertical"></li>
	  <li> <a title="Activités P2" href="?page=activitesP2"> P2</a></li>
	  <li class="divider-vertical"></li>
	  <li> <a title="Activités P3" href="?page=activitesP3"> P3</a></li>
	  <li class="divider-vertical"></li>
	  <li> <a title="Activités P4" href="?page=activitesP4"> P4</a> </li>
	  <li class="divider-vertical"></li>
	  <li> <a title="Activités P5" href="?page=activitesP5"> P5</a> </li>
     
	  </ul>
    </div>
   </div>
   </div>
   </div>
</div>	       
        
<script src="js/bootstrap2.js"></script> 
</body>	</html>
