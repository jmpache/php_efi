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
                <!-- LOG IN FORM -->
                <form action="mysql/login.php" method="POST" class="log-in">
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="si_inputEmail" class="col-form-label col-form-label-sm">Email</label>
                            <input class="form-control form-control-sm" id="si_inputEmail" name="si_email">
                        </div>
                        <div class="form-group col">
                            <label for="si_inputPassword" class="col-form-label col-form-label-sm">Password</label>
                            <input type="password" class="form-control form-control-sm" id="si_inputPassword" name="si_password">
                        </div>
                        <div class="form-group col d-flex align-items-end">
                            <button class="btn btn-sm btn-outline-success" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>

        <div class="container">
            <!-- SIGN IN FORM -->
            <div class="sign-in card float-lg-right shadow-lg mt-5">
                <div class="card-header text-center">
                    <h3 class="card-title font-weight-bold">Sign Up!</h3>
                    <p class="card-text">It's quick and easy.</p>
                </div>
                <div class="card-body">
                    <form action="mysql/register.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="text" class="form-control" name="firstName" id="inputFirstName" placeholder="First Name">
                            </div>
                            <div class="form-group col">
                                <input type="text" class="form-control" name="lastName" id="inputPassword4" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-9">
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="your_email@example.com">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                I am older than 18
                            </label>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success">Sign in</button>
                        </div>
                    </form>
                </div>
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
