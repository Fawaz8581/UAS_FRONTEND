var app = angular.module('registrationApp', []);

app.controller('RegistrationController', function ($scope, $http, $window) {
    $scope.user = {};

    // Fungsi untuk mendaftarkan user
    $scope.register = function () {
        // Mengirim data registrasi ke backend
        $http.post('/api/register', $scope.user)
            .then(function (response) {
                // Tampilkan pesan berhasil
                alert('Registration Successful');

                // Redirect ke halaman login setelah berhasil
                $window.location.href = '/login';  // Gantilah dengan path halaman login Anda
            })
            .catch(function (error) {
                // Tampilkan pesan error jika ada masalah saat registrasi
                alert('Error: ' + error.data.message);
            });
    };
});
