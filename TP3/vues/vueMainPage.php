
<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

// On s'amuse à créer quelques variables de session dans $_SESSION
$_SESSION['prenom'] = $prenom;
$_SESSION['nom'] = $nom;
$_SESSION['age'] = 24;
$_SESSION['mode']=$mode;
$_SESSION['linkpath']=$site;

?>


<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		<title>La Pépinière Labranche</title>
	
		<link id="linksite" rel="stylesheet" type="text/css" href=  <?php echo $_SESSION['linkpath']; ?> /> 
		<!-- <link id="link" rel="stylesheet" type="text/css" href= "../styles/mytp3.css" /> -->
      
	</head>

	<body>
	   <div id="entete">
		<!--<h1>La Pépinière Labranche <img id="summer" src="./images/image2.jpg" width="80" height="50"/> <img id="autumn"  src="./images/image1.jpg" width="80" height="50"/> </h1> -->
		
		<h1>La Pépinière Labranche
		<a href="index.php?action=summer"><img id="summer" src="./images/image2.jpg" width="80" height="50"/></a>
		<a href="index.php?action=autumn"><img id="autumn"  src="./images/image1.jpg" width="80" height="50"/></a></h1>
	
	
	</div>

	   <div id="navigation">
        <ul>
			<li><a href="index.php?action=produits">Produits</a></li>
			<li><a href="index.php?action=panier">Panier</a></li>
			
		</ul>
	   </div>

	   <div id="contenu">
		<button id="introduce">Introduire</button>
		<p id="introduceTxt"> Bienvenue sur notre plateforme d'achat, nous vous proposons différents thèmes pour le printemps et l'été, vous pouvez cliquer sur l'icône ci-dessus pour changer de thème></p>
		<img id="mainImage1" src="./images/image1.jpg"/>
		<img id="mainImage2" src="./images/image2.jpg"/>

		
		

		<form id="login" action="index.php?action=login&mode=<?=$mode ?>" method="post">
		          <p> <em> Prenom d'utilisateur </em> <br> </p>
				  <input id="prenom" type="text" name="prenom"><br> 
                  <p> <em> Nom d'utilisateur </em> </p>
				  <input id="nom" type="text" name="nom"><br>
                  <input type="submit" value="Envoyer">
                 
        </form>
		  
       </div>

	  <div id="pied">
	     <p id="copyright">la date du jour: <?= date('Y-m-d') ?>  </p>
		 <p>Dernière modification le 11 novembre 2022</p>

	  </div>

	  <script src="../scripts/jquery.js"></script>
	

	<script> 
	   var $txt = $ ("#contenu #introduceTxt");
	 
	    $txt.hide();
	    $("#mainImage1").hide();
		$("#mainImage2").hide();

		$(function() {
        $("#introduce").click(function(){

			$txt.show(4000,function(){
				$("#mainImage1").slideDown(4000,function(){

					$("#mainImage2").fadeIn(4000);

				});

			});
		
		});
		
        });
	
	</script>


</body>
</html>
