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
                // Jika login berhasil, tampilkan pop-up sukses dan arahkan ke halaman utama
                alert('Login Successful!');
                $window.location.href = '/';  // Redirect ke halaman utama
            }, function(error) {
                // Jika ada error, tampilkan pop-up error
                if (error.status === 401) {  // Unauthorized, login gagal
                    alert('Wrong Password');
                } else {
                    alert('An error occurred, please try again.');
                }
            });
    };
});
