<?php 
    $postData = unserialize(urldecode($_GET['data']));
    $id = $postData['id'];
    $title = $postData['title'];
    $username = $postData['username'];
    $description = $postData['description'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bloggie - Log In or Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="scripts.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="img/minilogo.png">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="">
            </a>
        </div>
    </nav>

    <!-- THIS FORM ALLOWS TO MODIFY THE SELECTED POST  -->
    <div class="card shadow-lg mx-auto mt-5" style="width: 30%;">
        <div class="card-body">
            <form action="mysql/modify.php?id='<?php echo $id ?>'" method="POST">
                <div class="form-row">
                    <div class="form-group col-6">
                        <input type="text" class="form-control" name="title" placeholder="<?php echo $title ?>">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" class="form-control" name="username" placeholder="<?php echo $username ?>">
                    </div>
                </div>
                <textarea class="form-control col" name="description" placeholder="<?php echo $description ?>"></textarea>
                <div class="float-lg-right mt-4">
                    <a href="home.php" class="btn btn-secondary mr-4">Cancel</a>
                    <button type="submit" class="btn btn-primary mr-4">Seems good</button>
                </div>
            </form>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>