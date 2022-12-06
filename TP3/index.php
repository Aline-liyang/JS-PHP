<?php
require('controleurs/controleur.php');
//$site="../styles/mytp3.css";


if(isset($_GET["action"])){
    if($_GET["action"] == "produits"){
        afficherProduits();
    
    }else if($_GET["action"] == "produit"){
        if(isset($_GET["idProduit"])){
            afficherProduit($_GET["idProduit"]);
        }
        else{
            afficherProduits();
        }

    }else if ($_GET["action"] == "ajouterPanier"){
        if(isset($_GET["idProduit"])){
            if($_POST["quantite"]>0){
            ajourterPanier($_GET["idProduit"],$_POST["quantite"]);}
            else{
                afficherProduit($_GET["idProduit"]); 
            }
        }
        else{
            afficherProduits();
        }

    }else if($_GET["action"] == "panier"){
        
            afficherPaniers();
    
    }else if($_GET["action"] == "afficherPanier"){ 
        
        if(isset($_GET["idPanier"])){
            
            afficherPanier($_GET["idPanier"]);
        }
        else{
            afficherProduits();
        }

    }else if($_GET["action"] == "modifierPanier"){ 
        
        if(isset($_GET["idPanier"])){
            if($_POST["quantite"]>0){
            modifierPanier($_GET["idPanier"],$_POST["quantite"]);}
            else{
                
                afficherPanier($_GET["idPanier"]);
            }
        }
        else{
            afficherProduits();
        }
    
    }else if($_GET["action"] == "supprimerPanier"){ 
        
        if(isset($_GET["idPanier"])){
         
            supprimerPanier($_GET["idPanier"]);
        }
        else{
            afficherProduits();
        }
    
    
 
    }else if($_GET["action"] == "summer"){ 
        $mode="summer";
        $site="../styles/mytp3m2.css";
       
                  $prenom=" ";
                  $nom=" ";        
                  afficherMainPage($site,$mode,$prenom,$nom);
        
    }else if(($_GET["action"] == "login")&&($_GET["mode"]=="summer")){ 
        $mode="summer";
        $site="../styles/mytp3m2.css";
        if(isset($_POST['prenom'])&&isset($_POST['nom'])) 
        {
              $prenom=$_POST['prenom'];
              $nom=$_POST['nom'];        
             
              afficherMainPage($site,$mode,$prenom,$nom);
        }else{
            $prenom=" ";
            $nom=" ";        
            afficherMainPage($site,$mode,$prenom,$nom);

        }

    }
    else if(($_GET["action"] == "login")&&($_GET["mode"]=="autumn")){ 
        $mode="autumn";
        $site="../styles/mytp3.css";
            if(isset($_POST['prenom'])&&isset($_POST['nom'])) 
            {
                  $prenom=$_POST['prenom'];
                  $nom=$_POST['nom'];        
                  afficherMainPage($site,$mode,$prenom,$nom);
            }

        else{
                  $prenom=" ";
                  $nom=" ";        
                  afficherMainPage($site,$mode,$prenom,$nom);
        }

      //  $mode="autumn";
       // $site="../styles/mytp3.css";
       // afficherMainPage($site,$mode,$prenom,$nom);
    }
    else { 
        $mode="autumn";
        $site="../styles/mytp3.css";
       
                  $prenom=" ";
                  $nom=" ";        
                  afficherMainPage($site,$mode,$prenom,$nom);
    }

}
  else{
    $prenom=" ";
    $nom=" ";   
    $mode="autumn";
    $site="../styles/mytp3.css";
    afficherMainPage($site,$mode,$prenom,$nom);
    
  }



