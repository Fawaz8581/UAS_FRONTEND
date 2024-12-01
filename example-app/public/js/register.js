angular.module('registrationApp', [])
.controller('RegistrationController', function($scope, $http, $window) {
    $scope.user = {
        username: '',
        email: '',
        password: ''
    };

    $scope.register = function() {
        // Send registration data to the API
        $http.post('/api/register', $scope.user)
            .then(function(response) {
                alert('Registration Successful!');
                $window.location.href = '/login';  // Redirect to the login page after successful registration
            }, function(error) {
                alert('Registration failed, please try again.');
            });
    };

    // Function to redirect to the login page
    $scope.redirectToLogin = function() {
        $window.location.href = '/login'; // Redirect to the login page
    };
});
