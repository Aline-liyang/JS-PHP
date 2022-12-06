<?php
require('modeles/modele.php');

function afficherProduits(){
	
	$req = getProduits();
	require('vues/vueProduits.php');
}



function afficherMainPage($site,$mode,$prenom,$nom){

	require('vues/vueMainPage.php');
}

function afficherProduit($idProduit){
    $messageP="";
	$produit=getProduit($idProduit);
	//echo $produit['name'];
	require('vues/vueProduit.php');
}

function ajourterPanier($idProduit,$quantite){
	$produit=getProduit($idProduit);
	if ($quantite<=$produit['qty']){
	    $rowCount=ajourtePanier($produit['id'],$produit['name'],$produit['price'],$produit['qty'],$quantite);

        //echo $produit['name'];
	    //echo $quantite;
	    //require('vues/vuePanier.php');
	    if($rowCount > 0){
		
		header('Location: index.php?action=produit&idProduit=' .$idProduit);
	    }else{
		echo "Impossible d'ajouter le commentaire";
	    }
	}else{
		$produit=getProduit($idProduit);
		$messageP="Pas assez de quantité";
		require('vues/vueProduit.php');
		
	}
}

function afficherPaniers(){
	$req = getPaniers();
	require('vues/vuePaniers.php');
}

function afficherPanier($idPanier){           
    
	$elementPanier = getPanier($idPanier); 
	//echo $elementPanier['produit_id'];
	$produit = getProduit($elementPanier['produit_id']);
	//echo $produit['name'];
  
	require('vues/vuePanier.php');

}

function modifierPanier($idPanier,$quantite){

	 $reqPanier= getPanier($idPanier); 
	 $reqProduit=getProduit($reqPanier['produit_id']);
	// echo $quantite;
	// echo $reqProduit['qty'];
	 if ($quantite<=($reqProduit['qty']+$reqPanier['produit_qty'])){
        $rowCount = mdfPanier($idPanier,$reqPanier['produit_id'],$reqPanier['produit_qty'],$reqProduit['qty'],$quantite,$reqPanier['produit_price']);
        echo $rowCount;
        if($rowCount > 0){
		$req= getPaniers();
		require('vues/vuePaniers.php');
	    }else{
		$elementPanier = $reqPanier;
	    $produit = getProduit($elementPanier['produit_id']);
		$message="Impossible d'modifier le panier";
		require('vues/vuePanier.php');
	    }
	}else{
		$elementPanier = $reqPanier;
	    $produit = getProduit($elementPanier['produit_id']);
		$message="Pas assez de quantité";
		require('vues/vuePanier.php');
	}

}

function  supprimerPanier($idPanier){
	$reqPanier= getPanier($idPanier); 
	$reqProduit=getProduit($reqPanier['produit_id']);
    suppPanier($idPanier,$reqPanier['produit_id'],$reqPanier['produit_qty'],$reqProduit['qty']);
	
	$req = getPaniers();
	require('vues/vuePaniers.php');
	
}

