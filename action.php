<?php
require 'mysql_crud.php';
if(isset($_POST['save']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $hometown = mysqli_real_escape_string($con, $_POST['hometown']);
    $dept_no = mysqli_real_escape_string($con, $_POST['dept_no']);
    $hire_date = mysqli_real_escape_string($con, $_POST['hire_date']);
    if($firstname == NULL || $lastname == NULL || $salary == NULL || $hometown == NULL || $dept_no == NULL || $hire_date == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    $query = "INSERT INTO employees (firstname,lastname,salary,hometown,dept_no,hire_date) VALUES 
        ('$firstname','$lastname','$salary','$hometown','$dept_no','$hire_date')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Not Created'
        ];
        echo json_encode($res);
        return;
    }
}
if(isset($_POST['update']))
{
    $emp_id = mysqli_real_escape_string($con, $_POST['emp_id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $hometown = mysqli_real_escape_string($con, $_POST['hometown']);
    $dept_no = mysqli_real_escape_string($con, $_POST['dept_no']);
    $hire_date = mysqli_real_escape_string($con, $_POST['hire_date']);

    if($firstname == NULL || $lastname == NULL || $salary == NULL || $hometown == NULL || $dept_no == NULL || $hire_date == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    $query = "UPDATE employees SET firstname='$firstname', lastname='$lastname', 
        salary='$salary', hometown='$hometown', dept_no='$dept_no', hire_date='$hire_date' 
                WHERE emp_id='$emp_id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['emp_id']))
{
    $emp_id = mysqli_real_escape_string($con, $_GET['emp_id']);
    $query = "SELECT * FROM employees WHERE emp_id='$emp_id'";
    $query_run = mysqli_query($con, $query);
    if(mysqli_num_rows($query_run) == 1)
    {
        $employee = mysqli_fetch_array($query_run);
        $res = [
            'status' => 200,
            'message' => ' Fetch Successfully by id',
            'data' => $employee
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => ' Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete']))
{
    $emp_id = mysqli_real_escape_string($con, $_POST['emp_id']);
    $query = "DELETE FROM employees WHERE emp_id='$emp_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => ' Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>