<!DOCTYPE html>
<html lang="en" ng-app="HealthApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/healthy.css') }}" rel="stylesheet">
</head>
<body ng-controller="HealthController">
    <div class="container py-5">
        <!-- Header Section -->
        <header class="text-center mb-5">
            <h1 class="display-4 text-primary">Health Tracker</h1>
            <p class="lead text-muted">Track your health metrics and stay informed!</p>
        </header>

        <!-- Add Entry Form -->
        <div class="card shadow-lg mb-4">
            <div class="card-body">
                <h5 class="card-title">Add New Health Entry</h5>
                <form ng-submit="addEntry()">
                    <div class="mb-3">
                        <label for="healthMetric" class="form-label">Health Metric</label>
                        <input type="text" class="form-control" id="healthMetric" ng-model="newEntry.metric" placeholder="e.g., Blood Pressure" required>
                    </div>
                    <div class="mb-3">
                        <label for="value" class="form-label">Value</label>
                        <input type="text" class="form-control" id="value" ng-model="newEntry.value" placeholder="e.g., 120/80" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Entry</button>
                </form>
            </div>
        </div>

        <!-- Display Health Entries -->
        <div class="row">
            <div class="col-md-4" ng-repeat="data in healthData">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">@{{ data.metric }}</h5>
                        <p class="card-text">Value: @{{ data.value }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script>
        var app = angular.module('HealthApp', []);

        app.controller('HealthController', function ($scope) {
            $scope.healthData = [];

            $scope.newEntry = {
                metric: '',
                value: ''
            };

            $scope.addEntry = function () {
                if ($scope.newEntry.metric && $scope.newEntry.value) {
                    $scope.healthData.push(angular.copy($scope.newEntry));
                    $scope.newEntry.metric = '';
                    $scope.newEntry.value = '';
                }
            };
        });
    </script>
</body>
</html>
