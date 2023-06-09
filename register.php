<?php
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account();

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Spotify</title>
</head>

<body>
    <div id="inputContainer">
        <form action="register.php" id="loginForm" method="POST">
            <h2>Login to your account</h2>
            <p>
                <?php echo $account->getError(Constants::$usernameCharacters);?>
                    <label for="loginUsername">Username</label>
                    <input type="text" id="loginUsername" name="loginUsername" placeholder="Username" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" placeholder="Your password" required>
            </p>
            <button type="submit" name="loginButton">LOG IN</button>
        </form>

        <form action="register.php" id="registerForm" method="POST">
            <h2>Create Your Free Account</h2>
            <p>
            <?php echo $account->getError(Constants::$usernameCharacters);?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php getInputValue('username') ?>" placeholder="eg millie" required>
            </p>
            <p>
            <?php echo $account->getError(Constants::$firstNameCharacters);?>
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" value="<?php getInputValue('firstName') ?>" placeholder="eg John" required>
            </p>
            <p>
            <?php echo $account->getError(Constants::$lastNameCharacters);?>
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="<?php getInputValue('lastName') ?>" placeholder="eg Michael" required>
            </p>
            <p>
            <?php echo $account->getError(Constants::$emailInvalid);?>
            <?php echo $account->getError(Constants::$emailsDoNotMatch);?>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php getInputValue('email') ?>" placeholder="millie@gmail.com" required>
            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input type="text" id="email2" name="email2" value="<?php getInputValue('email2') ?>" placeholder="millie@gmail.com" required>
            </p>
            <p>
            <?php echo $account->getError(Constants::$passwordCharacters);?>
            <?php echo $account->getError(Constants::$passwordsDoNotMatch);?>
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric);?>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Your password" required>
            </p>
            <p>
                <label for="password2">Confirm Password</label>
                <input type="password" id="password2" name="password2" placeholder="Your password" required>
            </p>
            <button type="submit" name="registerButton">SIGN UP</button>
        </form>
    </div>
</body>

</html>