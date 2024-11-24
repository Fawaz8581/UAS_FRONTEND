angular.module('loginApp', [])
.controller('LoginController', function($scope, $http, $window) {
    $scope.loginData = {
        email: '',
        password: ''
    };

    $scope.errorMessage = '';  // Menyimpan pesan error jika login gagal

    $scope.submitLogin = function() {
        // Kirim request POST ke API login dengan email dan password
        $http.post('/api/login', $scope.loginData)
            .then(function(response) {
                // Jika login berhasil, arahkan ke halaman utama '/'
                $window.location.href = '/';  // Redirect ke halaman utama
            }, function(error) {
                // Jika ada error, tampilkan pesan error
                if (error.status === 401) {  // Unauthorized, login gagal
                    $scope.errorMessage = 'Wrong Password';
                } else {
                    $scope.errorMessage = 'An error occurred, please try again.';
                }
            });
    };
});
