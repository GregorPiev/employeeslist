<!Doctype html>
<html ng-app="employeeRecords">
    <head>
        <title>Employees List. Laravel 5.5 AngularJS CRUD</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('css/app.css')}}"   rel="stylesheet" />
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet" />
        <link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet" />
    </head>
    <body ng-controller="employeeController">
        <div class="container" >
            <div class="row">
                <div class="panel col-lg-12">
                    <div class="panel-heading">
                        <h1>Employees List</h1>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th >Id</th>
                                    <th >Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Position</th>
                                    <th ><button class="btn btn-sm btn-primary"  ng-click="toggle('add', 0)" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="employee in employees">
                                    <td ng-bind="employee.id"></td>
                                    <td ng-bind="employee.name"></td>
                                    <td ng-bind="employee.email"></td>
                                    <td ng-bind="employee.contact_number"></td>
                                    <td ng-bind="employee.position"></td>
                                    <td>
                                        <button class="btn btn-sm btn-detail" ng-click="toggle('edit', employee.id)"  data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-sm btn-delete" ng-click="confirmDelete(employee.id)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" ng-bind="form_title"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form name="frmEmployee" class="form-horizontal" role="form" novalidate="">
                            <input type="hidden" name="id" ng-model="employee_detail.id"  value="@{{id}}" >
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Name:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" ng-model="employee_detail.name" ng-required="true" value="@{{name}}" >
                                    <span class="help-inline" ng-show="frmEmployee.name.$invalid && frmEmployee.name.$touched">Name field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Email:</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email" ng-model="employee_detail.email" ng-required="true" value="@{{email}}" >
                                    <span class="help-inline" ng-show="frmEmployee.email.$invalid && frmEmployee.email.$touched">Email field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Contact Number:</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" name="contact_number" id="contact_number" ng-model="employee_detail.contact_number" ng-required="true" value="@{{contact_number}}" >
                                    <span class="help-inline" ng-show="frmEmployee.contact_number.$invalid && frmEmployee.contact_number.$touched">Contact Number field is required</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Position:</label>
                                <div class="col-sm-9">
                                    <input type="text"  class="form-control" name="position" id="position" ng-model="employee_detail.position" ng-required="true" value="@{{position}}" >
                                    <span class="help-inline" ng-show="frmEmployee.position.$invalid && frmEmployee.position.$touched">Position field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button  class="btn btn-default btn-primary  pull-right"  ng-click="save(modalstate, id)" ng-disabled="frmEmployee.$invalid">Save changes</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


        <script src="{{ asset('app/lib/angular/angular.min.js')}}"></script>
        <script src="{{ asset('js/app.js')}}"></script>
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('app/lib/angular/angular-route.min.js')}}"></script>
        <script src="{{ asset('app/app.js')}}"></script>
        <script src="{{ asset('app/controllers/employees.js')}}"></script>
    </body>
</html>
