<?php

$dsn = 'mysql:host=127.0.0.1;dbname=challenges_sql';
$user = 'root';
$password = '';

$connection = new PDO($dsn, $user, $password);

//check if user entry are two value not null
if (isset($_POST["product"]) != false && isset($_POST["category"]) !=false ){
    if($_POST["product"] != ""){
        $statement = addProduct($connection);
        $statement->bindValue(':category_name', $_POST["category"]);
        $statement->bindValue(':product_name', $_POST["product"]);
        $statement->execute();
    }else echo '<div class="alert alert-success" role="alert">
        Vous ne pouvez pas ajouter de donnée. Une des deux valeurs est nulle. 👌
    </div>';
}else if(isset($_GET["delete"]) != false){
    $statement = deleteProduct($connection);
    $statement->execute();
}

//Display shopping list
$statement = displayShoppingList($connection);
$statement->execute();

//get array of db table
$shoppingList = $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);

//Function manage data
function displayShoppingList($_connection){
    return $_connection->prepare("
        SELECT category, product, id FROM shopping_list
        ORDER BY category;
    ");
}

function deleteProduct($_connection){
    return $_connection->prepare("
        DELETE FROM shopping_list
        WHERE id=".$_GET["delete"].";
    ");
}

function addProduct($_connection){
    return $_connection->prepare("
        INSERT INTO shopping_list (category,product)
        VALUES
            (:category_name, :product_name)
        ;
    ");
}
?>

 <!doctype html>
 <html lang="en">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>Liste de courses</title>

     <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 </head>
 <body>
     <main role="main">
         <div class="jumbotron">
             <div class="container">
                 <h1 class="display-3">Ma liste de courses</h1>
             </div>
         </div>

         <div class="container">
             <h2>Choses à acheter</h2>

             <?php
                //Display shopping list if not empty
                $_echo;
                 if (count($shoppingList)==0){
                     $_echo = '<div class="alert alert-success" role="alert">
                         La liste de course est vide. 👌
                     </div>';
                 }
                 else{
                     $_echo = '<table class="table">';
                        foreach ($shoppingList as $key => $category) {
                            foreach ($category as $product) {
                                $_echo.= '<tr>
                                    <th width="250px">'.$key.'</th>
                                    <td>'.$product["product"].'</td>
                                    <td style="text-align: right"><a href="courses.php?delete='.$product["id"].'">Supprimer</a><td>
                                </tr>';
                            }
                        }
                    $_echo.='</table>';
                 }
                 echo $_echo;
             ?>
             <hr />

             <h2>Ajouter un produit</h2>
             <form action="courses.php" method="POST">
                 <div class="form-group">
                     <label for="product">Produit</label>
                     <input name="product" type="product" class="form-control" id="product" placeholder="Nom du produit">
                 </div>
                 <div class="form-group">
                     <label for="category">Catégorie</label>
                     <select class="form-control" name="category">
                         <option value="Animaux">Animaux</option>
                         <option value="Bébé">Bébé</option>
                         <option value="Boissons et Cave à vins">Boissons et Cave à vins</option>
                         <option value="Charcuterie">Charcuterie</option>
                         <option value="Crémerie">Crémerie</option>
                         <option value="Entretien et nettoyage">Entretien et nettoyage</option>
                         <option value="Epicerie Salée">Epicerie Salée</option>
                         <option value="Epicerie Sucrée">Epicerie Sucrée</option>
                         <option value="Fruits et Légumes">Fruits et Légumes</option>
                         <option value="Hygiène et Beauté">Hygiène et Beauté</option>
                         <option value="Maison, Loisir, Textile">Maison, Loisir, Textile</option>
                         <option value="Pains et Pâtisseries">Pains et Pâtisseries</option>
                         <option value="Surgelés">Surgelés</option>
                         <option value="Traiteur">Traiteur</option>
                         <option value="Viandes et Poissons">Viandes et Poissons</option>
                     </select>
                 </div>

                 <button type="submit" class="btn btn-primary">Ajouter un produit</button>
             </form>
         </div>
     </main>
 </body>
 </html>
