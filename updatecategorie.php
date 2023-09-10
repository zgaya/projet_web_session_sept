<?php
include_once ('C:/xampp/htdocs/projetweb1/config.php');
include_once ('C:/xampp/htdocs/projetweb1/Controller/categorieC.php');
$error = "";

// create categorie
$categorie = null;
// var_dump($_GET['idCategorie']); 
// create an instance of the controller
$categorieC = new categorieC();
if (
    isset($_GET["idCategorie"]) &&
    isset($_POST["nomC"]) &&
    isset($_POST["descriptionC"])
) {
    print_r($_POST);
    if (
        !empty($_GET["idCategorie"]) &&
        !empty($_POST['nomC']) &&
        !empty($_POST["descriptionC"])
    ) {
        $categorie = new categorie(
            $_GET['idCategorie'],
            $_POST['nomC'],
            $_POST['descriptionC']
        );
        var_dump($categorie);
        print_r("avant modification");
        $categorieC->updatecategorie($categorie, $_GET["idCategorie"]);
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
     
        $categorie = $categorieC->recuperercategorie($_GET['idCategorie']);
        
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
                                <label for="idCategorie">id categorie</label>
                                <input type="text" value="<?php  $idCategorie=$_GET['idCategorie']; echo $idCategorie ?>" class="form-control" name="idCategorie" id="idCategorie" placeholder="Enter the category ID">
                            </div>
                            <div class="form-group">
                                <label for="nomC">Name</label>
                                <input type="text" class="form-control" value="<?php echo $categorie['nomC']; ?>" name="nomC" id="nomC" placeholder="Enter the category name" oninput="validateLetters(this)">
                            </div>
                            <div class="form-group">
                                <label for="descriptionC">Message</label>
                                <textarea class="form-control"  name="descriptionC" id="descriptionC" value="<?php echo $categorie['descriptionC']; ?>" rows="4" placeholder="<?php echo $categorie['descriptionC']; ?>" oninput="validateLetters(this)"></textarea>
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




