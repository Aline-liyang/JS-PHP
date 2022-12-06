<?php
session_start(); // On démarre la session AVANT toute chose
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>la liste des Produis</title>
       <!-- <link href="../styles/mytp3.css" rel="stylesheet" /> -->
        <link href= <?php echo $_SESSION['linkpath']; ?>  rel="stylesheet" type="text/css"/> 
    </head>
        
    <body>
        <div id="entete">
		    <h1>La Pépinière Labranche</h1>
	    </div>
        
        <div id="contenu">
            <h1>
                <em><strong><?=$produit['name'] ?></strong></em>
            </h1>
            <p> <img id="produitImg" src="<?=$produit['pimg'] ?>" width="160" height="100"/>
            <p> <em><strong> Description:</strong></em> <?=$produit['description'] ?> </p>
            <p> <em><strong> Prix:</strong></em> <?=$produit['price'] ?> </p>
            <p> <em><strong> Quantité disponible:</strong></em> <?=$produit['qty'] ?> </p>
            <br/>
            <br/>
            <br/>

            <form action="index.php?action=ajouterPanier&idProduit=<?=$produit['id'] ?>" method="post">
                  <p> <em><strong> - Combien êtes-vous prêt à commander?</strong></em> <br> </p>
                  <p> <strong> Entrez les quantités: </strong> <br> </p>
                  <input type="text" name="quantite"><br>
                  <input type="submit" value="Envoyer">
                 
            </form>
            <br/>
            <p id="modifierResultProduit"><?php echo $messageP ;?></p>
            <br/>
            <br/>
            <p><a href="index.php?action=produits">Retour à la liste des produits</a></p>
            <p><a href="index.php?action=panier">Aller au panier</a></p>
            <p><a href="index.php?action=<?php echo $_SESSION['mode']?>"> Retour à la page principale</a></p>
        </div>
        <div id="pied">
		     <p id="copyright">la date du jour: <?= date('Y-m-d') ?>  </p>
        <p>Dernière modification le 25 novembre 2014</p>

	  </div>

      <script src="../scripts/jquery.js"></script>
	

	<script> 

		$(function() {
           
            
            $('#produitImg').mouseover(function() {
         
		       $('#produitImg').css('width','320px');
               $('#produitImg').css('height','200px');
		      });
		    $('#produitImg').mouseout(function() {
               $('#produitImg').css('width','160px');
               $('#produitImg').css('height','100px');
		     });

       

            
		});

	</script>

       
    </body>
</html>