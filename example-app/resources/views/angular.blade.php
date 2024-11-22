<!DOCTYPE html>
<html lang="en" ng-app="CardApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Functionality</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-title {
            font-weight: bold;
        }
    </style>
</head>
<body ng-controller="CardController">
    <div class="container py-5">
        <!-- Header -->
        <header class="text-center mb-5">
            <h1 class="text-primary">Dynamic Cards</h1>
            <p class="lead">Add and manage your data dynamically using AngularJS.</p>
        </header>

        <!-- Add Card Form -->
        <div class="card shadow-lg mb-4">
            <div class="card-body">
                <h5 class="card-title">Add New Card</h5>
                <form ng-submit="addCard()">
                    <div class="mb-3">
                        <label for="title" class="form-label">Card Title</label>
                        <input type="text" class="form-control" id="title" ng-model="newCard.title" placeholder="Enter title" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Card Content</label>
                        <textarea class="form-control" id="content" ng-model="newCard.content" placeholder="Enter content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Card</button>
                </form>
            </div>
        </div>

        <!-- Display Cards -->
        <div class="row">
            <div class="col-md-4" ng-repeat="card in cards">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">@{{ card.title }}</h5>
                        <p class="card-text">@{{ card.content }}</p>
                        <button class="btn btn-danger w-100" ng-click="removeCard($index)">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script>
        var app = angular.module('CardApp', []);

        app.controller('CardController', function ($scope) {
            $scope.cards = [];

            $scope.newCard = {
                title: '',
                content: ''
            };

            $scope.addCard = function () {
                if ($scope.newCard.title && $scope.newCard.content) {
                    $scope.cards.push(angular.copy($scope.newCard));
                    $scope.newCard.title = '';
                    $scope.newCard.content = '';
                }
            };

            $scope.removeCard = function (index) {
                $scope.cards.splice(index, 1);
            };
        });
    </script>
</body>
</html>
