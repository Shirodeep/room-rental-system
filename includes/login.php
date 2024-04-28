<body>
    <?php include_once('./partials/header.php');
    if ($_GET['error']) {
        echo '<div class="alert alert-danger" role="alert">
Either email/contact or password is incorrect
</div>';
    }

    ?>
    <div class="container mr-5" style="width: 115vh;height:max-content; background-color: whitesmoke;">
        <h1 class="h1 pt-2 ">Login</h1>
        <form action="./login.inc.php" onsubmit="return validate()" method="post">
            <div class="row p-3">
                <div class="col">
                    <label class="form-label" for="loginid">Email or contact</label>&nbsp;
                </div>
                <input class="form-control" type="text" id="loginid" name="loginid" required>
            </div>
            <spam id="email-error" class="text-danger" style="font-size: 12;"></spam>
            <div class="row p-3">
                <div class="col">
                    <label class="form-label" for="name">Password</label> &nbsp;
                    <div class="row">
                        <input class=" col form-control" type="password" id="password" name="password" required>
                        <div class="col-sm-2 col-lg-1">
                            <button class="btn btn-secondary" type="button" style="height:100%;" onclick="showAndHide()"><i class="bi bi-eye" style="font-size: 3vh;"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <spam class="password-error"></spam>
            <div class="row p-3" style="width:max-content">
                <button class="btn btn-outline-secondary text-dark" type="submit">Submit</button>
            </div>
        </form>
        <hr>
        <p>Don't have account yet <a href="./register.php"> <button class="btn btn-outline-secondary" type="button">Register</button></a>&nbsp;here</p>
    </div>
    <?php include_once('./partials/footer.php'); ?>
</body>
<script>
    function showAndHide() {
        let toggle = document.getElementById("password").type;
        if (toggle == "password") {
            document.getElementById("password").type = "text";
        } else {
            document.getElementById("password").type = "password";
        }
    }

    function validate() {
        let email = document.getElementById("email");
        if (email != RegExp("^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$")) {
            document.getElementById("email-error").innerHTML = "email error";
            return false;
        }
        return true;
    }
</script>