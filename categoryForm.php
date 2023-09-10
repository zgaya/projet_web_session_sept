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

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg mt-5">
                    <div class="card-header">
                        Category Form
                    </div>
                    <div class="card-body">
                      <form  id="form" action="addcategory.php" method="POST">
                            <div class="form-group">
                                <label for="nomC">Name</label>
                                <input type="text" class="form-control" name="nomC"  id="nomC" placeholder="Enter the category name">
                            </div>
                            <div class="form-group">
                                <label for="descriptionC">Message</label>
                                <textarea class="form-control"  name="descriptionC" id="descriptionC" rows="4" placeholder="Enter the description"></textarea>
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
   

</body>

</html>
