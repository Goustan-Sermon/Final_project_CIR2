<?php
ob_start();
require_once ("../model/User.php");
$error=User::register();
?>

    <section class="section">
        <div class="container py-5 h-100 ">
            <div class="row justify-content-center align-items-center h-100 ">
                <div class="col-12 col-lg-9 col-xl-7 ">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px; background: rgba(0,0,0,0.80);
    border: 2px solid rgba(0,0,0,0.5)">
                        <div class="card-body p-4 p-md-5 ">
                            <h2 style="text-align: center;" class="mb-4 pb-2 pb-md-0 mb-md-5 text-light">Registration
                                Form</h2>
                            <form style="color:white;" method="post" action="#">
                                <div class="row">
                                    <div class="col-md-6 mb-1">

                                        <div class="input-box" style="width: 210px;">
                                            <input type="text" name="firstName" id="firstName" value="<?php echo $_POST['firstName']; ?>">
                                            <label class="form-label" for="firstName">First Name</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-1">

                                        <div class="input-box" style="width: 210px;">
                                            <input type="text" name="lastName" id="lastName" value="<?php echo $_POST['lastName']; ?>">
                                            <label class="form-label" for="lastName">Last Name</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-1 pb-2">
                                        <div class="input-box" style="width: 210px;">
                                            <input type="email" name="emailAddress" id="emailAddress" value="<?php echo $_POST['emailAddress']; ?>">
                                            <label class="form-label" for="emailAddress">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1 pb-2">
                                        <div class="input-box" style="width: 210px;">
                                            <input type="number" name="Age" id="Age" min='1' value="<?php echo $_POST['phoneNumber']; ?>">
                                            <label class="form-label" for="Age">Age</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-1 pb-2">
                                        <div class="input-box" style="width: 210px;">
                                            <input type="password" name="password" id="password">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-1 pb-2">
                                        <div class="input-box" style="width: 210px;">
                                            <input type="password" name="confirm" id="confirm">
                                            <label class="form-label" for="confirm">Confirm password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class='alert'><?php echo $error ?></div>
                                <button type="submit" value="Register">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
$content2 = ob_get_clean();
require_once('template2.php');