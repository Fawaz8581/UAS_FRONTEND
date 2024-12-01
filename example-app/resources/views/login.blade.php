<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponsonbys Care - Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body ng-app="loginApp" ng-controller="LoginController">
    <div class="login-container">
        <h1>Login</h1>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>


        <div class="register-link-container">
            <p>Don't have an account? <span class="register-link" ng-click="redirectToLogin()">Register here</span></p>
        </div>

        

    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
