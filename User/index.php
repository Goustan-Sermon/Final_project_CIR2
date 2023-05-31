<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();

?>

    <section class="section">
        <div class="form-box">
            <div class="form-value">
                <form action="#" method="post">
                    <h2>Login</h2>
                    <div class="input-box">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required name="email" id="email" autocomplete="off" <?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password" id="password">
                        <label for="password">Password</label>
                    </div>

                    <?php
                    echo "<div class='alert'>".$user_id."</div>";
                    ?>

                    <button type="submit">Log in</button>
                    <div class="register">
                        <p>Don't have account ? <a href="user_register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
$content_login = ob_get_clean();
require_once('template_login.php');