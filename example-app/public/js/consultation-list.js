var app = angular.module('consultationListApp', []);

app.controller('ConsultationListController', function($scope, $http) {
    // Initialize variables
    $scope.consultations = [];
    $scope.searchText = '';
    $scope.filterDoctor = '';
    $scope.sortBy = 'schedule';
    $scope.sortReverse = false;
    
    // Available doctors for filter
    $scope.doctors = ['Dr. Ahmad', 'Dr. Sarah', 'Dr. Budi'];
    
    // Load consultations from API
    function loadConsultations() {
        $http.get('/api/consultations')
            .then(function(response) {
                $scope.consultations = response.data;
            })
            .catch(function(error) {
                console.error('Error loading consultations:', error);
            });
    }

    // Format date
    $scope.formatDate = function(dateString) {
        return new Date(dateString).toLocaleString('en-US', {
            year: 'numeric',
            month: 'short',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
        });
    };

    // Search filter function
    $scope.searchFilter = function(consultation) {
        if (!$scope.searchText) return true;
        
        var searchText = $scope.searchText.toLowerCase();
        return (consultation.name && consultation.name.toLowerCase().includes(searchText)) ||
               (consultation.symptoms && consultation.symptoms.toLowerCase().includes(searchText)) ||
               (consultation.doctor && consultation.doctor.toLowerCase().includes(searchText));
    };

    // Doctor filter function
    $scope.doctorFilter = function(consultation) {
        if (!$scope.filterDoctor) return true;
        return consultation.doctor === $scope.filterDoctor;
    };

    // Edit consultation
    $scope.editConsultation = function(consultation) {
        // Implement edit functionality
        console.log('Edit consultation:', consultation);
    };

    // Delete consultation
    $scope.deleteConsultation = function(consultation) {
        if (confirm('Are you sure you want to delete this consultation?')) {
            $http.delete('/api/consultations/' + consultation._id)
                .then(function() {
                    var index = $scope.consultations.indexOf(consultation);
                    $scope.consultations.splice(index, 1);
                })
                .catch(function(error) {
                    console.error('Error deleting consultation:', error);
                });
        }
    };

    // Initialize
    loadConsultations();
});