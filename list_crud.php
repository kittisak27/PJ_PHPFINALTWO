<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="./css/confix_nav.css">
    <title>PHP CRUD</title>
  </head>
  <body>
    <nav>
      <button class="btn-hamburger">
        <i class="fas fa-bars"></i>
      </button>
      <h2>PROJECT PHP</h2>
      <ul>
        <li><a href="nav.html">Home</a></li>
        <li><a href="list_crud.php">Data</a></li>
        <li><a href="user_detail.php">Account</a></li>
        <li><a href="about.html">about</a></li>
        <li><a href="c_logout.php" class="btn-Logout">Logout</a></li>
      </ul>
    </nav>
  </body>
</html>

<!-- Create Employee -->
<div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveEmployee">
            <div class="modal-body">
                <div id="errorMessage" class="alert alert-warning d-none"></div>
                <div class="mb-3">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Salary</label>
                    <input type="text" name="salary" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">HomeTown</label>
                    <input type="text" name="hometown" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Dept No</label>
                    <input type="text" name="dept_no" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Hire Date</label>
                    <input type="date" name="hire_date" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Create</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                
            </div>
        </form>
        </div>
    </div>
</div>
<!-- Update Employee Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updateEmployee">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                <input type="hidden" name="emp_id" id="emp_id" >

                <div class="mb-3">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Salary</label>
                    <input type="text" name="salary" id="salary" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Hometown</label>
                    <input type="text" name="hometown" id="hometown" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Dept No</label>
                    <input type="text" name="dept_no" id="dept_no" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Hire Date</label>
                    <input type="date" name="hire_date" id="hire_date" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-warning">Update</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- ShowEmployee Modal -->
<div class="modal fade" id="ShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Show Information Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">First Name</label>
                    <p id="showfirstname" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Last Name</label>
                    <p id="showlastname" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Salary</label>
                    <p id="showsalary" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Hometown</label>
                    <p id="showhometown" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Dept Name</label>
                    <p id="showdept_no" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Hire Date</label>
                    <p id="showhire_date" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1><center>PHP CRUD INFORMATION EMPLOYEES</center></h1>
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#CreateModal">
                            Create Record
                        </button>     
                </div>
                <div class="card-body">

                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                    <tr>
                        <th width="10%">Emp_id</th>
                        <th width="30%">First Name</th>
                        <th width="30%">Last Name</th>
                        <th width="30%">Salary</th>
                        <th width="30%">Home Town</th>
                        <th width="10%">Dept No</th>
                        <th width="40%">dept Name</th>
                        <th width="40%">HireDate</th>
                        <th width="10%">Update</th>
                        <th width="10%">Show</th>
                        <th width="10%">Delete</th>
                     </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'mysql_crud.php';
                            $query = "SELECT *FROM employees INNER JOIN dept ON employees.dept_no = dept.dept_no;";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $employee)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $employee['emp_id'] ?></td>
                                        <td><?= $employee['firstname'] ?></td>
                                        <td><?= $employee['lastname'] ?></td>
                                        <td><?= $employee['salary'] ?></td>
                                        <td><?= $employee['hometown'] ?></td>
                                        <td><?= $employee['dept_no'] ?></td>
                                        <td><?= $employee['dept_name'] ?></td>
                                        <td><?= $employee['hire_date'] ?></td>
                                        <td>
                                        <button type="button" value="<?=$employee['emp_id'];?>" class="CreateBtn btn btn-warning ">Update</button>
                                        </td>
                                        <td>
                                        <button type="button" value="<?=$employee['emp_id'];?>" class="ShowBtn btn btn-primary ">Show</button>
                                        </td>
                                        <td>
                                        <button type="button" value="<?=$employee['emp_id'];?>" class="DeleteBtn btn btn-danger ">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        $(document).on('submit', '#saveEmployee', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("save", true);
            $.ajax({
                type: "POST",
                url: "action.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#CreateModal').modal('hide');
                        $('#saveEmployee')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#table').load(location.href + " #table");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.CreateBtn', function () {

            var emp_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "action.php?emp_id=" + emp_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#emp_id').val(res.data.emp_id);
                        $('#firstname').val(res.data.firstname);
                        $('#lastname').val(res.data.lastname);
                        $('#salary').val(res.data.salary);
                        $('#hometown').val(res.data.hometown);
                        $('#dept_no').val(res.data.dept_no);
                        $('#hire_date').val(res.data.hire_date);
                        $('#UpdateModal').modal('show');
                    }

                }
            });
        });
        $(document).on('submit', '#updateEmployee', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update", true);

            $.ajax({
                type: "POST",
                url: "action.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);
                    }else if(res.status == 200){
                        $('#errorMessageUpdate').addClass('d-none');
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        $('#UpdateModal').modal('hide');
                        $('#updateEmployee')[0].reset();
                        $('#table').load(location.href + " #table");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });
        });

        $(document).on('click', '.ShowBtn', function () {
            var emp_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "action.php?emp_id=" + emp_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {
                        alert(res.message);
                    }else if(res.status == 200){
                        $('#showfirstname').text(res.data.firstname);
                        $('#showlastname').text(res.data.lastname);
                        $('#showsalary').text(res.data.salary);
                        $('#showhometown').text(res.data.hometown);
                        $('#showdept_no').text(res.data.dept_no);
                        $('#showhire_date').text(res.data.hire_date);

                        $('#ShowModal').modal('show');
                    }
                }
            });
        });
        $(document).on('click', '.DeleteBtn', function (e) {
            e.preventDefault();
            if(confirm('Are you sure you want to delete this data?'))
            {
                var emp_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "action.php",
                    data: {
                        'delete': true,
                        'emp_id': emp_id
                    },
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {
                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);
                            $('#table').load(location.href + " #table");
                        }
                    }
                });
            }
        });

    </script>

</body>
</html>