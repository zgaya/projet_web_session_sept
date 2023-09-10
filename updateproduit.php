<?php
include_once ('C:/xampp/htdocs/projetweb1/config.php');
include_once ('C:/xampp/htdocs/projetweb1/Controller/produitC.php');
$error = "";

// create produit
$produit = null;
// var_dump($_GET['idProduit']); 
// create an instance of the controller
$produitC = new produitC();
if (
    isset($_GET["idProduit"]) &&
    isset($_POST["idCategorie"]) &&
    isset($_POST["nomP"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["descriptionP"])
) {
    print_r($_POST);
    if (
        !empty($_GET["idProduit"]) &&
        !empty($_POST["idCategorie"]) &&
        !empty($_POST['nomP']) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["descriptionP"])
    ) {
        $produit = new produit(
            $_GET['idProduit'],
            $_POST['idCategorie'],
            $_POST['nomP'],
            $_POST['prix'],
            $_POST['descriptionP']
        );
       $produitC->updateproduit($produit, $_POST["idProduit"]);
        //  var_dump($produit);
        header('Location:index.php');
    } else
        $error = "Missing information";
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Form with SB Admin 2</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include SB Admin 2 CSS -->
    <link href="sb-admin-2.css" rel="stylesheet">
</head>
<?php
        $produit = $produitC->recupererproduit($_GET['idProduit']);
        // print_r("apres recuperation");
        // print_r($produit);
 ?> 
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg mt-5">
                    <div class="card-header">
                        Update Form
                    </div>
                    <div class="card-body">
                        <form id="form" action="" method="POST">
                            <div class="form-group">
                                <label for="idProduit">id produit</label>
                                <input type="text" value="<?php  $idProduit=$_GET['idProduit']; echo $idProduit ?>" class="form-control" name="idProduit" id="idProduit" placeholder="Enter the category ID">
                            </div>
                            <div class="form-group">
                                <label for="idCategorie">id categorie</label>
                                <input type="text" value="<?php  echo $produit['idCategorie']; ?>" class="form-control" name="idCategorie" id="idCategorie" placeholder="Enter the category ID">
                            </div>
                            <div class="form-group">
                                <label for="nomP">Name</label>
                                <input type="text" class="form-control" value="<?php echo $produit['nomP'];  ?>" name="nomP" id="nomP" placeholder="Enter the category name" oninput="validateLetters(this)">
                            </div>
                            <div class="form-group">
                                <label for="Prix">Prix</label>
                                <input type="float" class="form-control"  name="prix" id="prix" value="<?php echo $produit['prix'];   ?>" rows="4" placeholder="<?php ?>">
                            </div>
                            <div class="form-group">
                                <label for="descriptionP">Message</label>
                                <textarea class="form-control"  name="descriptionP" id="descriptionP" value="<?php echo $produit['descriptionP']; 
                                ?>" rows="4" placeholder="<?php echo $produit['descriptionP']; ?>" oninput="validateLetters(this)"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap and SB Admin 2 JS scripts if needed -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function validateLetters(input) {
            var value = input.value;
            var newValue = value.replace(/[^a-zA-Z ]/g, ''); // Remove non-letter characters
            input.value = newValue;
        }
    </script>
</body>

</html>




