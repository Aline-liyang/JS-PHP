<?php
session_start(); // On démarre la session AVANT toute chose
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>la liste des Produis</title>
        <!--<?php echo $_SESSION['linkpath']; ?> -->
        <link href= <?php echo $_SESSION['linkpath']; ?>  rel="stylesheet" type="text/css" /> 

       <!-- <link id="link" rel="stylesheet" type="text/css" href= "../styles/mytp3.css" /> -->
        <link href="../styles/temp.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div id="entete">
		    <h1>La Pépinière Labranche</h1>
	    </div>
        
        <div id="contenu">
            <h1>
                <em><strong>Panier</strong></em>
            </h1>
            <br/>
            <h2>Votre panier:</h2>
            <p>Utilsateur:  <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></p> 
            <table id="monpanier" >
                 <thead>
                   
                 </thead>
                 <tbody id="monpanierbody" >
                   <tr >
                     <th>Element</th>
                     <th>Prix</th>
                     <th>Quantité</th>
                     <th>Amount</th>
                     <th></th>
                     <th></th>
                   </tr>
                   <?php
                     $total=0;
                     $monpanierelement=array();
                     $monpanierprix=array();
                     $monpanierquantite=array();
                     $monpanieramount=array();
                     $x=0;

                     while ($panier= $req->fetch())
                     { $monpanierelement[$x]=$panier['produit_name'];
                        $monpanierprix[$x]=$panier['produit_price'];
                        $monpanierquantite[$x]=$panier['produit_qty'];
                        $monpanieramount[$x]=$panier['produit_amount'] ;
                   ?>
                   <tr>
                     <td id="monpanierelement"><?=$panier['produit_name'] ?></td>
                     <td id="monpanierprix" class="prix"><?=$panier['produit_price'] ?></td>
                     <td id="monpanierquantite" class="prix" ><?=$panier['produit_qty'] ?></td>
                     <td id="monpanieramount" class="prix" ><?=$panier['produit_amount'] ?></td>
                     <td id="modifier"><a href="index.php?action=afficherPanier&idPanier=<?= $panier['id'] ?>"><em>Modifier</em></a></td>
                     <td id="supprimer"><a href="index.php?action=supprimerPanier&idPanier=<?= $panier['id'] ?>"><em>Supprimer</em></a></td>
                                       
                   </tr>
                   <?php
                    $total=$total+$panier['produit_amount'];
                    $x=$x+1;
                    }
                    $req->closeCursor();
                   ?>
                <tfoot>
                  <tr>
                    <td >Total</td>
                    <td id="monpaniertotal" colspan="3" class="prix" ><?=$total?> </td>
                  </tr>
                </tfoot>
            </table>      
	         <br/>
          <button id="getfacture" >Obtenir votre facture</button>
          <br/>
          <br/>

      <table id="facture1" class="tablehide">
        <caption id="facture1title"> Facture de votre achat </caption>
        <thead>
        <tr class="facture1personinfo">
          <td  colspan="4">
           <span id="facture1nom">Merci de faire affaire avec nous: <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> </span><br />
          </td>
        </tr>
        </thead>
        <tbody id="facture1body" >
        <tr >
          <th>Element</th>
          <th>Prix</th>
          <th>Quantité</th>
          <th>Amount</th>
        </tr>

             <?php
               for($i=0;$i<count($monpanierelement);$i++){
             ?>
        
              <tr>
              <td id="facture1element"><?= $monpanierelement[$i] ?></td>
              <td id="facture1prix" class="prix"><?= $monpanierprix[$i] ?></td>
              <td id="facture1quantite" class="prix" ><?= $monpanierquantite[$i] ?></td>
              <td id="facture1amount" class="prix" ><?=  $monpanieramount[$i] ?></td>
              </tr>
             <?php
               }
             ?>
       
      
       
        <tfoot>
        <tr>
          <td >Total</td>
          <td id="facture1total" colspan="3"><?=$total?> </td>
        </tr>
        </tfoot>
        </table>


           
           
            <br/>
            <p><a class="rightFormat" href="index.php?action=produits">Retour à la liste des produits</a></p><br/>
            <p><a class="rightFormat" href="index.php?action=<?php echo $_SESSION['mode']?>"> Retour à la page principale</a></p>

        </div>
        <div id="pied">
		     <p id="copyright">la date du jour: <?= date('Y-m-d') ?>  </p>
        <p>Dernière modification le 11 novembre 2022</p>

	  </div>

    <script src="../scripts/jquery.js"></script>
	

	  <script> 

          $(function() {

            $('#getfacture').click(function(){
              $("#facture1").removeClass("tablehide");
              $("#facture1").addClass("tableshow");
              $("#facture1").hide();
              if ( $(this).text()=="Obtenir votre facture" )
              {
                $("#facture1").show(5000,"linear");
                 $(this).text("Cache votre facture");
              
              }else{
                $("#facture1").hide('slow');
                $(this).text("Obtenir votre facture");
                
              }
       	

            })

          });


      </script>

   
       
    </body>
</html>