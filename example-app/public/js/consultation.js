var app = angular.module('consultationApp', []);

function redirectToHome() {
    window.location.href = '/home';
}

app.controller('ConsultationController', function($scope, $http) {
    // Initialize consultation object
    $scope.consultation = {};
    
    // List of available doctors
    $scope.doctors = [
        'Dr. Smith',
        'Dr. Johnson',
        'Dr. Williams',
        'Dr. Brown'
    ];

    // Form submission handler
    $scope.submitForm = function() {
        if ($scope.consultForm.$valid) {
            // Prepare the data
            var consultationData = {
                name: $scope.consultation.name,
                age: parseInt($scope.consultation.age),
                address: $scope.consultation.address,
                schedule: $scope.consultation.schedule,
                doctor: $scope.consultation.doctor,
                symptoms: $scope.consultation.symptoms,
                description: $scope.consultation.description || ''
            };

            // Send POST request to API
            $http.post('/api/consultations', consultationData)
                .then(function(response) {
                    // Show success message
                    Toastify({
                        text: "Consultation scheduled successfully!",
                        duration: 3000,
                        style: {
                            background: "#7FA98E"
                        }
                    }).showToast();
                    
                    // Reset form
                    $scope.consultation = {};
                    $scope.consultForm.$setPristine();
                    $scope.consultForm.$setUntouched();
                })
                .catch(function(error) {
                    // Show error message
                    Toastify({
                        text: "Error: " + (error.data.message || "Something went wrong!"),
                        duration: 3000,
                        style: {
                            background: "#ff4444"
                        }
                    }).showToast();
                });
        }
    };

    // Helper function to format date for datetime-local input
    $scope.formatDate = function(date) {
        if (!date) return '';
        var d = new Date(date);
        var month = '' + (d.getMonth() + 1);
        var day = '' + d.getDate();
        var year = d.getFullYear();
        var hour = '' + d.getHours();
        var minute = '' + d.getMinutes();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        if (hour.length < 2) hour = '0' + hour;
        if (minute.length < 2) minute = '0' + minute;

        return [year, month, day].join('-') + 'T' + [hour, minute].join(':');
    };
});

// Add this at the bottom of your file
document.addEventListener('DOMContentLoaded', function() {
    // Close button functionality for alerts
    document.querySelectorAll('.btn-close').forEach(function(button) {
        button.addEventListener('click', function() {
            var alert = this.closest('.alert');
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 150);
        });
    });

    // Auto-hide alerts after 3 seconds
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 150);
        });
    }, 3000);
});