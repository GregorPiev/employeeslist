app.controller('employeeController', function ($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "employees")
            .then(function (response) {
                console.info("%cEmployee list:" + JSON.stringify(response), "color: green");
                $scope.employees = response.data;
                $scope.form_title = "List of Employee";
            },
                    function (response) {
                        console.log("%cError retrieve employee list:" + response.statusText, "color: red;");
                    }
            );

    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                $scope.employee_detail = {};
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http.get(API_URL + "employees/" + id)
                        .then(
                                function (response) {
                                    console.info("%cEmployee detail:" + JSON.stringify(response), "color: green");
                                    $scope.employee_detail = response.data;

                                },
                                function (response) {
                                    console.log("%cError retrieve employee detail:" + response.statusText, "color: red;");
                                }
                        );
                break;
            default:
                break;
        }

        console.log("%cEmployee id:" + id, "color:brown;font-weight:bold;font-size:18px;");
        console.info("%cEmployee detail:" + JSON.stringify($scope.employee_detail), "color: green");
        $('#myModal').modal('show');
    };

    $scope.save = function (modalstate, id) {
        console.info("%cSave:" + modalstate + " // " + id, "color: indigo");
        let url = API_URL + 'employees';
        if (modalstate === 'edit') {
            url += '/' + id;
        }
        console.info("%cSave Employee detai data:" + JSON.stringify($scope.employee_detail), "color: blue");

        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee_detail),
            headers: {
                'Content-type': 'application/x-www-form-urlencoded'
            }
        }).then(
                function (response) {
                    console.info("%cSave Employee:" + response, "color: green");
                    $('#myModal').modal('hide');
                    location.reload();
                },
                function (response) {
                    console.log("%cError rsave employee:" + response.statusText, "color: red;");
                    alert('This is embarassing. An error has occured. Please check the log for detail');
                }
        );
    };

    //Delete Employee
    $scope.confirmDelete = function (id) {
        let isConfirmDelete = confirm('Are you sure you want to delete this record?');
        console.info("%cDelete Employee id:" + id, "color: green");
        if (isConfirmDelete) {
            $http({
                method: 'delete',
                url: API_URL + "employees/" + id
            }).then(
                    function (response) {
                        console.info("%cDelete Employee:" + response, "color: green");
                        location.reload();
                    },
                    function (response) {
                        console.log("%cError delete employee:" + response.statusText, "color: red;");
                        alert('Unable to delete');
                    }
            );
        } else {
            return false;
        }

    };
});