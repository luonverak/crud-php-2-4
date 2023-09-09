<!DOCTYPE html>
<?php include('function.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid bg-dark float-end">
        <h1 class="text-light m-0">Student</h1>
        <button id="openAdd" type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal">
        <i class="fa-solid fa-plus"></i> Add Student
        </button>
    </div>
    <table class="table table-hover table-dark" style="table-layout: fixed;" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Score</th>
                <th>Acction</th>
            </tr>
        </thead>
        <tbody>
            <?php getData()?>
        </tbody>
    </table>
    <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 id="txt" class="modal-title">Student Information</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form action="" method="post">
                <label for="">FullName</label>
                <input type="text" name="fullname" id="fullname" class="form-control mb-3" >
                <label for="">Gender</label>
                <select name="gender" id="gender" class="form-select mb-3"  >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <label for="">Score</label>
                <input type="text" name="score" id="score" class="form-control" >
                <!-- Hidden Id -->
                <input type="hidden" name="stu_id" id="stu_id">
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button name="btnSave" id="btnSave" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    <button name="btnUpdate" id="btnUpdate" type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $("#fullname").val("");
        $("#gender").val("");
        $("#score").val("");
        $('#openAdd').click(function(){
            $('#btnSave').show();
            $('#btnUpdate').hide();
             document.getElementById('txt').innerText='Enter Student Information';
        })
        $('body').on('click','#openUpdate',function(){
            $('#btnSave').hide();
            $('#btnUpdate').show();
            document.getElementById('txt').innerText='Edit Student Information';
            id     = $(this).parents('tr').find('td').eq(0).text();
            name   = $(this).parents('tr').find('td').eq(1).text();
            gender = $(this).parents('tr').find('td').eq(2).text();
            score  = $(this).parents('tr').find('td').eq(3).text();
            $("#fullname").val(name);
            $("#gender").val(gender);
            $("#score").val(score);
            $("#stu_id").val(id);
        })
    })
</script>
</html>