<?php
function getProduits()
{

	$bdd=connexionDB();
	$req = $bdd->query('SELECT * FROM produits order by name');

	return $req;

}

function getProduit($idProduit)
{
	$bdd = connexionDB();

    $req = $bdd->prepare('SELECT * FROM produits WHERE id = :Produit');
    $req->execute(array(
		"Produit" => $idProduit
	));
    $produit = $req->fetch();

    return $produit;
}


function ajourtePanier($idProduit, $nameProduit, $priceProduit, $qtyProduit, $quantite)
{
    $bdd = connexionDB();

	

	$reqPanier = $bdd->prepare('SELECT * FROM panier WHERE produit_id = :id_Produit');
    $reqPanier -> execute(array(
		"id_Produit" => $idProduit
	));


    if($reqPanier->rowCount() > 0){

        $panierO = $reqPanier->fetch();

		$amountProduit=$priceProduit*($quantite+$panierO['produit_qty']);
	
		$req = $bdd->prepare('UPDATE panier set produit_qty=:qty_produit, produit_amount=:amount_produit, panier_date=Now()  where produit_id=:id_produit');
   
		$req->execute(array(
		   "id_produit" => $idProduit,
		   "qty_produit" => ($quantite+$panierO['produit_qty']),
		   "amount_produit" => $amountProduit
	
		));
		$reqProduit = $bdd->prepare('UPDATE produits set qty=:qty_Produit  where id=:id_Produit');
   
	    $reqProduit->execute(array(
		    "id_Produit" => $idProduit,
		    "qty_Produit" => $qtyProduit-$quantite
		
	    ));
   
	} else{

	 $amountProduit=$priceProduit*$quantite;
	
	 $req = $bdd->prepare('INSERT INTO panier (produit_id, produit_name ,produit_price, produit_qty, produit_amount,panier_date) VALUES (:id_produit, :name_produit, :price_produit,:qty_produit,:amount_produit, NOW())');

	 $req->execute(array(
		"id_produit" => $idProduit,
		"name_produit" => $nameProduit,
		"price_produit" => $priceProduit,
		"qty_produit" => $quantite,
		"amount_produit" => $amountProduit
 
	 ));
	 $reqProduit = $bdd->prepare('UPDATE produits set qty=:qty_Produit  where id=:id_Produit');
   
	 $reqProduit->execute(array(
		"id_Produit" => $idProduit,
		"qty_Produit" => $qtyProduit-$quantite
		
	));

	}

	 return $req->rowCount();
 
}

function getPaniers(){
	$bdd=connexionDB();
	$req = $bdd->query('SELECT * FROM panier order by panier_date');

	return $req;

}

function getPanier($idPanier){

	$bdd=connexionDB();
	$req = $bdd->prepare('SELECT * FROM panier  where id=?');
	$req->execute(array($idPanier));
  

    return $req->fetch();
	
}


function mdfPanier($idPanier,$idProduit,$quantitePanier,$quantiteProduit,$quantite,$priceProduit){

	$bdd=connexionDB();

	$reqProduitN = $bdd->prepare('UPDATE produits set qty=:qty_Produit  where id=:id_Produit');
   	$reqProduitN->execute(array(
	    "id_Produit" => $idProduit,
	    "qty_Produit" => ($quantiteProduit+$quantitePanier-$quantite)
	   
    ));

	
    
	$reqPanierN = $bdd->prepare('UPDATE panier set produit_qty=:qty_Produit, produit_amount=:amount_produit, panier_date=Now() where id=:id_Panier');
	$reqPanierN->execute(array(
	      "id_Panier" => $idPanier,
	      "qty_Produit" => $quantite,
		  "amount_produit" => $priceProduit*$quantite

	));

		
    return  $reqPanierN->rowCount();
	
}

function suppPanier($idPanier,$idProduit,$quantitePanier,$quantiteProduit){

	$bdd=connexionDB();
	$reqProduitN = $bdd->prepare('UPDATE produits set qty=:qty_Produit  where id=:id_Produit');
	$reqProduitN->execute(array(
	 "id_Produit" => $idProduit,
	 "qty_Produit" => $quantiteProduit+$quantitePanier
	
    ));



	$reqD = $bdd->prepare('DELETE from panier  where id=?');
	$reqD->execute(array($idPanier));
  

   





}





function connexionDB(){
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		return $bdd;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
}
