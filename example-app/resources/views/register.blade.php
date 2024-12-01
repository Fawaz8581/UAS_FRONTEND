<!DOCTYPE html>
<html ng-app="registrationApp">
<head>
    <link rel="stylesheet" href="css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="/js/register.js"></script>
    <title>Ponsonbys Care - Register</title>
</head>
<body ng-controller="RegistrationController">
    <div class="register-container">
        <h1>Register</h1>
        <form ng-submit="register()">
            <label for="username">Username:</label>
            <input type="text" id="username" ng-model="user.username" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" ng-model="user.email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" ng-model="user.password" required>
            <br>
            <button type="submit">Register</button>
        </form>

        <div class="register-link-container">
            <p>Already have an account? <span class="register-link" ng-click="redirectToLogin()">Login here</span></p>
        </div>
    </div>
</body>
</html>
