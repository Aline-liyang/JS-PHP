<?php
session_start(); // On démarre la session AVANT toute chose
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>la liste des Produis</title>
       <!-- <link href="../styles/mytp3.css" rel="stylesheet" /> -->
       <link id="link2" href= <?php echo $_SESSION['linkpath']; ?>  rel="stylesheet"  type="text/css"/> 
    </head>
        
    <body>
        <div id="entete">
		    <h1>La Pépinière Labranche</h1>
	    </div>
        
        <div id="contenu">
            <h1>
                <em><strong><?=$elementPanier['produit_name'] ?></strong></em>
            </h1>
           
           
            <p> <em><strong>Prix: </strong></em> <?=$elementPanier['produit_price'] ?> </p>
           
            <p> <em><strong> Quantité en stock: </strong></em> <?= $produit['qty'] ?> </p>                                                                                              
            <p> <em><strong> Quantité déjà commandée: </strong></em> <?=$elementPanier['produit_qty'] ?> </p>
            <br/>
           
                
            <form action="index.php?action=modifierPanier&idPanier=<?= $elementPanier['id'] ?>" method="post">
                  <p> <em><strong> - Avez-vous besoin de modifier la quantité de commande ？</strong></em> <br> </p>
                  <p> <strong> Entrez les quantités: </strong> <br> </p>
                  <input type="text" name="quantite"><br>
                  <input type="submit" value="Envoyer">
                 
            </form>
            <br/>
         
            <p id="modifierResult"></p>

            <br/>
            <br/>
            
            <p><a href="index.php?action=panier">Aller au panier</a></p>
        </div>
        <div id="pied">
		     <p id="copyright">la date du jour: <?= date('Y-m-d') ?>  </p>
             <p>Dernière modification le 25 novembre 2014</p>

	  </div>
      <script src="../scripts/jquery.js"></script>

      <script> 

         $(function() {

            $("#modifierResult").text('<?php echo $message ;?>');
  
 

    

         });


</script>

	
    </body>
</html>