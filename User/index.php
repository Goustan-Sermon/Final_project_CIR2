<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();

?>
    <video autoplay loop muted id="video-bg">
        <source src="../image/BG.mp4" type="video/mp4">

        Your browser does not support the video tag.
    </video>

    <section class="section">
        <div class="form-box">
            <div class="form-value">
                <form action="#" method="post">
                    <h2>Login</h2>
                    <div class="input-box">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email" id="email" autocomplete="off">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password" id="password">
                        <label for="password">Password</label>
                    </div>

                    <div class="alert"><?php echo $user_id; ?></div>

                    <button type="submit">Log in</button>
                    <div class="register">
                        <p>Don't have an account? <a href="user_register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>


<?php
$content_login = ob_get_clean();
require_once('template_login.php');