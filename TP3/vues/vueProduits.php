<?php
session_start(); // On démarre la session AVANT toute chose
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>la liste des Produis</title>
       <!-- <link href="../styles/mytp3.css" rel="stylesheet" /> -->
       <link id="linksitem" href= <?php echo $_SESSION['linkpath']; ?>  rel="stylesheet"  type="text/css"/> 

    </head>
        
    <body>
        <div id="entete">
		    <h1>La Pépinière Labranche</h1>
	    </div>
        
        <div id="contenu">
            <h2>
                <em>la liste des Produis</em>
            </h2>
            <ul id="lstproduits">
            <?php
           while ($produits = $req->fetch())
             {
           ?>
               <li><a href="index.php?action=produit&idProduit=<?=$produits['id']?>"><?= nl2br(htmlspecialchars($produits['name'])) ?></a>
           <?php
             }
             $req->closeCursor();
           ?>
           </ul>


            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>




            <p><a href="index.php?action=<?php echo $_SESSION['mode']?>"> Retour à la page principale</a></p>
            <p><a href="index.php?action=panier">Aller au panier</a></p>
        </div>
        <div id="pied">
		     <p id="copyright">la date du jour: <?= date('Y-m-d') ?>  </p>
             <p>Dernière modification le 25 novembre 2014</p>

	  </div>
       
    </body>
</html>