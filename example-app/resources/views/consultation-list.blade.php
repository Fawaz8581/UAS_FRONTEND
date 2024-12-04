<!DOCTYPE html>
<html lang="en" ng-app="consultationListApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponsonbys Care - Consultation List</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/consultation-list.css') }}" rel="stylesheet">
</head>
<body ng-controller="ConsultationListController">
    <div class="container mt-4">
        <h2 class="mb-4">Consultation List</h2>

        <!-- Search and Filter Section -->
        <div class="row mb-4">
            <div class="col-md-4">
                <input type="text" 
                       class="form-control" 
                       ng-model="searchText" 
                       placeholder="Search consultations...">
            </div>
            <div class="col-md-3">
                <select class="form-select" ng-model="filterDoctor">
                    <option value="">All Doctors</option>
                    <option ng-repeat="doctor in doctors" value="@{{doctor}}">@{{doctor}}</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" ng-model="sortBy">
                    <option value="schedule">Sort by Date</option>
                    <option value="name">Sort by Name</option>
                    <option value="doctor">Sort by Doctor</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" ng-click="sortReverse = !sortReverse">
                    <i class="bi" ng-class="{'bi-sort-up': !sortReverse, 'bi-sort-down': sortReverse}"></i>
                    @{{ sortReverse ? 'Desc' : 'Asc' }}
                </button>
            </div>
        </div>

        <!-- Consultations Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Doctor</th>
                        <th>Schedule</th>
                        <th>Symptoms</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="consultation in consultations | filter:searchFilter | filter:{doctor: filterDoctor} | orderBy:sortBy:sortReverse">
                        <td>@{{consultation.name}}</td>
                        <td>@{{consultation.age}}</td>
                        <td>@{{consultation.doctor}}</td>
                        <td>@{{consultation.schedule | date:'MMM dd, yyyy HH:mm'}}</td>
                        <td>@{{consultation.symptoms}}</td>
                        <td>
                            <button class="btn btn-sm btn-primary me-1" ng-click="editConsultation(consultation)">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" ng-click="deleteConsultation(consultation)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Consultation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form name="editForm">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" ng-model="editingConsultation.name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Age</label>
                                <input type="number" class="form-control" ng-model="editingConsultation.age" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Doctor</label>
                                <select class="form-select" ng-model="editingConsultation.doctor" required>
                                    <option ng-repeat="doctor in doctors" value="@{{doctor}}">@{{doctor}}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Schedule</label>
                                <input type="datetime-local" class="form-control" 
                                       ng-model="editingConsultation.schedule" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Symptoms</label>
                                <input type="text" class="form-control" ng-model="editingConsultation.symptoms" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" ng-click="updateConsultation()" 
                                ng-disabled="editForm.$invalid">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="{{ asset('js/consultation-list.js') }}"></script>
</body>
</html>