
<?php 
$idCategorie=$_GET['idCategorie'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include SB Admin 2 CSS -->
    <link href="sb-admin-2.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg mt-5">
                    <div class="card-header">
                        Product Form
                    </div>
                    <div class="card-body">
                        <form id="form" action="" method="POST">
                            <div class="form-group">
                                <label for="nomP">Name</label>
                                <input type="text" class="form-control" name="nomP" id="nomP" placeholder="Enter the product name" oninput="validateLetters(this)">
                            </div>
                            <div class="form-group">
                                <label for="prixP">price</label>
                                <input type="float" class="form-control" name="prixP" id="prixP" placeholder="Enter the product price" oninput="">
                            </div>
                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

                            <label for="idCategorie">ID Categorie</label>
                            <div class="form-group">
                                <input type="float" value=<?php echo $idCategorie;?> class="form-control" name="idCategorie" id="idCategorie" >
                            </div>
                    <!-- <label for="img">image produit</label>
                 <form action="/action_page.php">
                 <input type="file" id="myFile" name="filename">

                 </form> -->
                            <div class="form-group">
                                <label for="descriptionP">Message</label>
                                <textarea class="form-control" name="descriptionP" id="descriptionP" rows="4" placeholder="Enter the description" oninput="validateLetters(this)"></textarea>
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

<?php
include_once ('C:/xampp/htdocs/projetweb1/config.php');
include_once ('C:/xampp/htdocs/projetweb1/Controller/categorieC.php');
include_once ('C:/xampp/htdocs/projetweb1/Controller/produitC.php');

// var_dump($_POST);
$idCategorie=$_GET['idCategorie'];
if (isset($_POST['nomP']) && isset($_POST['descriptionP']) && isset($_GET['idCategorie']) && isset($_POST['prixP']))
{   
    
    $rep=new produit(NULL,$idCategorie,$_POST['nomP'],$_POST['prixP'],$_POST['descriptionP']);
    $produitC=new produitC();
    $produitC->ajouterproduit($rep);
   
     header('Location: index.php'); 
    // header('Location: sendmail.php'); 
 }
?>