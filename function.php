<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
    // connection database
    $connection = new mysqli('localhost','root','','php2-4');
    function insert(){
        global $connection;
        if(isset($_POST['btnSave'])){
            $name   = $_POST['fullname'];
            $gender = $_POST['gender'];
            $score  = $_POST['score'];
            if(!empty($name) && !empty($gender) && !empty($score)){
                $sql = "INSERT INTO `student`(`name`, `gender`, `score`)
                        VALUES ('$name','$gender','$score')";
                $rs  = $connection->query($sql);
                if($rs){
                    echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success",
                            button: "Aww yiss!",
                            });
                        })
                    </script>
                    ';
                }
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                            title: "Error!",
                            text: "Somethings wrong!",
                            icon: "error",
                            button: "Aww yiss!",
                            });
                        })
                    </script>
                    ';
            }
        }
    }
    insert();
    function getData(){
        global $connection;
        $sql = "SELECT * FROM `student`";
        $rs  = $connection->query($sql);
        while($row=mysqli_fetch_assoc($rs)){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['score'].'</td>
                    <td class="d-flex">
                        <button id="openUpdate" type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#myModal"  ><i class="fa-solid fa-pen-to-square"></i> Update</button>
                        <form method="post">
                        <input type="hidden" value="'.$row['id'].'" name="id">
                        <button name="btn_delete" type="submit" class="btn btn-danger" ><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            ';
        }
    }
    function delete(){
        global $connection;
        if(isset($_POST['btn_delete'])){
            $id=$_POST['id'];
            $sql = "DELETE FROM `student` WHERE id='$id'";
            $rs  = $connection->query($sql);
            if($rs){
                    echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success",
                            button: "Aww yiss!",
                            });
                        })
                    </script>
                    ';
                }
        }
    }
    delete();
    function update(){
        global $connection;
        if(isset($_POST['btnUpdate'])){
            $name   = $_POST['fullname'];
            $gender = $_POST['gender'];
            $score  = $_POST['score'];
            $id     = $_POST['stu_id'];
            if(!empty($name) && !empty($gender) && !empty($score) && !empty($id)){
                $sql = "UPDATE `student` SET `name`='$name',`gender`='$gender',`score`='$score' WHERE id='$id'";
                $rs  = $connection->query($sql);
                if($rs){
                    echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success",
                            button: "Aww yiss!",
                            });
                        })
                    </script>
                    ';
                }
            }
        }
    }
    update();
?>