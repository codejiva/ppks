<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/styles/login.css">
    <link rel="icon" href="../assets/img/Lambang_Politeknik_Statistika_STIS.png" type="image/png">
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="login_process.php" method="POST">
                <h1>Sign in</h1>
                <div class="infield">
                    <input type="email" placeholder="Email" name="email" required />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" name="password" required />
                    <label></label>
                </div>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
            </div>
        </div>
    </div>
</body>

</html>