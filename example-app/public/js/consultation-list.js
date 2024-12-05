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
        console.log('Edit button clicked', consultation);
        $scope.editingConsultation = angular.copy(consultation);
        
        if ($scope.editingConsultation.schedule) {
            $scope.editingConsultation.schedule = new Date($scope.editingConsultation.schedule);
        }
        
        var modalElement = document.getElementById('editModal');
        console.log('Modal element:', modalElement);
        
        var myModal = new bootstrap.Modal(modalElement);
        myModal.show();
    };

    // Update consultation
    $scope.updateConsultation = function() {
        // Format the date properly
        let consultationData = angular.copy($scope.editingConsultation);
        
        // Convert Date object to ISO string for the API
        if (consultationData.schedule instanceof Date) {
            consultationData.schedule = consultationData.schedule.toISOString();
        }

        // Get the string _id from the MongoDB document
        const id = $scope.editingConsultation._id.$oid || $scope.editingConsultation._id;

        // Remove MongoDB specific fields
        delete consultationData._id;
        delete consultationData.$$hashKey;

        console.log('Sending update data:', consultationData); // Debug log
        console.log('ID:', id); // Debug log

        $http.put('/api/consultations/' + id, consultationData)
            .then(function(response) {
                // Update the item in the list
                var index = $scope.consultations.findIndex(c => (c._id.$oid || c._id) === id);
                if (index !== -1) {
                    $scope.consultations[index] = angular.copy($scope.editingConsultation);
                }
                
                // Close modal
                var modalElement = document.getElementById('editModal');
                var modal = bootstrap.Modal.getInstance(modalElement);
                modal.hide();
                
                // Show success message
                Toastify({
                    text: "Consultation updated successfully!",
                    duration: 3000,
                    style: { background: "#7FA98E" }
                }).showToast();
            })
            .catch(function(error) {
                console.error('Update error:', error); // Debug log
                Toastify({
                    text: "Error: " + (error.data?.error || "Failed to update consultation"),
                    duration: 3000,
                    style: { background: "#ff4444" }
                }).showToast();
            });
    };

    // Delete consultation
    $scope.deleteConsultation = function(consultation) {
        if (confirm('Are you sure you want to delete this consultation?')) {
            // Get the string _id from the MongoDB document
            const id = consultation._id.$oid || consultation._id;
            
            $http.delete('/api/consultations/' + id)
                .then(function(response) {
                    // Hapus dari list
                    var index = $scope.consultations.findIndex(c => (c._id.$oid || c._id) === id);
                    if (index !== -1) {
                        $scope.consultations.splice(index, 1);
                    }
                    
                    // Tampilkan notifikasi sukses
                    Toastify({
                        text: "Consultation deleted successfully!",
                        duration: 3000,
                        style: { background: "#7FA98E" }
                    }).showToast();
                })
                .catch(function(error) {
                    console.error('Delete error:', error); // Debug log
                    Toastify({
                        text: "Error: " + (error.data?.error || "Failed to delete consultation"),
                        duration: 3000,
                        style: { background: "#ff4444" }
                    }).showToast();
                });
        }
    };

    // Initialize
    loadConsultations();
});