<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <title>Main</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ajax.js"></script>
</head>

<body>
    <h2>Welcome</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" id="ajax_signup_form">
                <h1>Create Account</h1>
                 <?php
                //if($_SESSION['message']){
                  //  echo '<p> ' . $_SESSION['message'] . ' </p>';
                //}
              //  unset($_SESSION['message']);
            ?> 
                <input type="text" name="name" placeholder="Name" required minlength="2" maxlength="2" pattern="^[а-яА-ЯёЁa-zA-Z0-9]+$" title="Only letters and numbers!" />
                <input type="text" name="login" placeholder="Login" required pattern="(?=^.{6,}$)^[а-яА-ЯёЁa-zA-Z0-9]+$" title="Only letters and numbers! At least 6 symbols!" />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" id="password" name="password" placeholder="Password" required pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Must be a number, letters in different cases and a special symbol! At least 6 symbols!"
                />
                <input type="password" id="confirm-pass" name="confirm-pass" placeholder="Confirm password" required />
                <button type="submit" id="btn1">Sign Up</button>
                <script src="js/form_validation.js"></script>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="POST" id="ajax_login_form">
                <h1>Sign in</h1>
                <input type="text" name="login1" placeholder="Login" required />
                <input type="password" name="password1" placeholder="Password" required />
                <button type="submit" id="btn2">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <div id="response">
        <h1 id="result_form"></h1>
        <button id="btn3">Logout</button>

    </div>
    <script src="js/form.js"></script>
</body>

</html>