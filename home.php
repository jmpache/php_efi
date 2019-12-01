<?php
    session_start();
    if (!isset($_SESSION['user']))
    {
        header('Location:index.php');
    }
    include 'mysql/mysqlfunctions.php';
    $function = New MySqlFunctions();
    $category = isset($_GET['category']) ? $_GET['category'] : false;
    $categories = $function -> getCategories($category);
    $posts = $function -> getPosts($category);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bloggie - Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
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
            <p class="navUsername"><?php echo $_SESSION['user'] ?></p>
            <a href="mysql/logout.php"><button class="btn btn-secondary"> Log out </button></a>
        </div>
    </nav>

    <!-- CREATE POST FORM -->
    <div class="card shadow-lg mx-auto mt-5" style="width: 30%;">
        <div class="card-body">
            <form action="mysql/post.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-6">
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="form-group col-6">
                        <input type="text" class="form-control" name="username" placeholder="Author">
                    </div>
                </div>
                <textarea class="form-control col" placeholder="Write here what you want!" name="description" required></textarea>
                <div class="float-lg-right mt-4">
                    <button type="submit" class="btn btn-success mr-4">Post!</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">

        <div class="form-group mt-5" style="width: 30%">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select category<?php echo $category ? (': '.$category) : '' ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php foreach ($categories as $category) {
                        echo '<a class="dropdown-item"
                                 href="home.php?category='.$category['nombre'].'">'
                                 .$category['nombre'].
                             '</a>';
                    } ?>
                </div>
            </div>
        </div>

        <!-- RENDER POSTS -->
        <?php
            while($row = mysqli_fetch_assoc($posts)){
                echo 
                '
                <div class="card mt-5 shadow-lg">
                    <div class="card-header row">
                        <div class="col">
                            <h5>'.$row['titulo'].'</h5>
                            <p>'.$row['nombre'].'</p>
                        </div>
                        <div class="col">
                            <p class="float-lg-right">'.$row['creado'].'<p>
                        </div>
                    </div>
                    <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>'.$row['descripcion'].'</p>
                        <footer class="blockquote-footer">'.$row['firstname'].' '.$row['lastname'].'</footer>
                    </blockquote>
                    <div class="float-lg-right">
                        <a href="mysql/delete.php?id='.$row['id'].'"><span class="badge badge-danger">Delete</span></a>
                        <a href="modifyPost.php?data='.urlencode(serialize($row)).'"><span class="badge badge-secondary">Modify</span></a>
                    </div>
                    </div>
                </div>
                ';
            }
        ?>
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
