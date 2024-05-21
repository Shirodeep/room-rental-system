<body>
    <?php
    include_once('./partials/header.php');
    $passwordType = "password";
    $inserted = $_GET["q"];
    $p = $_GET["p"];
    if ($inserted == 1  and $inserted != "") { ?>
        <div class="row alert alert-warning alert-dismissible fade show" role="alert">
            <strong class="col-11">SUCCESS USER CREATED!</strong>
            <button type="button" class="col btn btn-outline-success" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } elseif ($inserted == 0 and $inserted != "") {
    ?>
        <div class="row alert alert-warning alert-dismissible fade show" role="alert">
            <strong class="col-11">Check Your Form. USER EXISTS!!!</strong>
            <button type="button" class="col btn btn-outline-warning" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        <?php
    }
    if ($p == 0 and $p != "") {
        ?>
            <div class="row alert alert-warning alert-dismissible fade show" role="alert">
                <strong class="col-11">Check Your Form!</strong> PASSWORD AND CONFIRM PASSWORD DO NOT MATCH!!!
                <button type="button" class="col btn btn-outline-warning" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <?php
            $p = 1;
        }


            ?>

            <div class="container mr-5" style="width: 130vh;height:max-content; background-color: whitesmoke;">
                <h1 class="h1 pt-2 ">REGISTER</h1>
                <?php $title = "register"; ?>
                <form action="/includes/register.inc.php" onsubmit="return validate()" method="post">
                    <div class="form-row ">
                        <div class="col p-3">
                            <div class="form-row">
                                <label for="firstname">Firstname</label>&nbsp;
                                <input class="form-control col-xs-3" type="text" name="firstname" required>
                            </div>
                        </div>
                        <div class="col p-3">
                            <div class="form-row">
                                <label for="middlename">Middlename</label>&nbsp;
                                <input class="form-control col-xs-3" type="text" name="middlename">
                            </div>
                        </div>
                        <div class="col p-3">
                            <div class="form-row">
                                <label for="lastname">Lastname</label>&nbsp;
                                <input class="form-control col-xs-3" type="text" name="lastname" required>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col">
                            <label for="email">Email</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-control" type="email" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col">
                            <label for="password">Password</label> &nbsp;
                            <div class="row">
                                <input class="col form-control" type="password" name="password" id="password" required>
                                <button class="col-lg-1 btn btn-secondary col-sm-1" type="button" onclick="showandhide('password')">
                                    <i class="bi bi-eye" style="font-size: 3vh;"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col">
                            <label for="confirmPassword">Confirm password</label> &nbsp;
                            <div class="row">
                                <input class=" col form-control" type="password" name="confirmPassword" id="confirmPassword" required>
                                <button class="col-lg-1  btn btn-secondary col-sm-1" type="button" onclick="showandhide('confirmPassword')"><i class="bi bi-eye" style="font-size: 3vh;"></i></button>

                            </div>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col">
                            <label class="form-check-label" for="Gender">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check form-check-inline" type="radio" name="gender" value="male" id="male" required>
                            <label class="form-check-label" for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input class="form-check form-check-inline" type="radio" name="gender" id="female" value="female" required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="row p-3">
                        <div class="col">
                            <label for="contact">Contact</label> &nbsp;
                            <div class="row">
                                <input class="col-2" style="border-radius: 15%;" type="text" placeholder="+977" readonly>
                                <input class="col form-control" type="text" name="contact" id="contact" required>

                            </div>
                        </div>
                    </div>
                    <input class="btn btn-outline-secondary text-dark" type="submit" name="submit" value="Submit">
                </form>
            </div>
            <?php include_once('./partials/footer.php'); ?>
</body>

<script>
    function validate() {
        let password = document.getElementById("password");
        let confirmPassword = document.getElementById("confirmPassword");
        if (password == confirmPassword) {
            alert("password should match")
            return false;
        }
    }

    function showandhide(data) {
        let showPassword = document.getElementById(data);
        if (showPassword.type == "password") {
            showPassword.type = "text";
        } else {
            showPassword.type = "password";
        }
    }
</script>