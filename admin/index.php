<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php');?>
    <title>Admin Login</title>
</head>
<style>
    .login-form{
        width: 500px;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* visibility: hidden; comment out this line */

    }

    .con{
        
        margin-top: 120px;
        /* top: 50%;
        transform: translate(0%, -50%); */
    }

    .box:hover{
        /* border-radius: 20% !important; */
        border: 2px solid var(--blueBtn) !important;
        box-shadow: var(--blueBtn) !important;
        transition-duration: 0.25s;
        transform: scale(1.03);
        transition: all 0.3s;
        background-color: var(--textCol);
        
    }

</style>
<body>
    <?php require('inc/header.php')?>
    <div class="bg-image" style="background-image: url('../img/bg/2.webp');">
    <?php
        if(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)
        {
            echo<<<data
            <div class="container con px-5">
                <div class="row mt-5 mx-5 p-3 m-3 ">

                    <a href="books.php" class="btn p-2 ms-5 box  rounded shadow" style="height: 250px; width:250px;">
                        <div class="container text-center align-items-center">
                            <img src="../img/logo/pencil-square.svg" class="logo mt-5" height="100px">
                            <h4 class="fw-bold mt-3">Edit Book</h4>
                        </div>
                    </a>

                    

                    <a href="feedback.php" class="btn p-2 ms-5 box  rounded shadow" style="height: 250px; width:250px;">        
                        <div class="container text-center">
                            <img src="../img/logo/card-text.svg" class="logo mt-5" height="100px">
                            <h4 class="fw-bold mt-3 ">View Feedback</h4>
                        </div>
                    </a>
                    
                    
                    
                </div>

                </br>
                </br></br>
                


                
            </div>
data;
        }

        else
        {
            echo<<<data
            <div class="login-form text-center bg-white shadow rounded overflow-hidden">
                    <form method="POST">
                        <h4 class="bg-dark text-white py-3 text-center font1">Admin Login</h4>
                        <div class="p-4">
                            <div class="mb-3">
                                <input type="text" placeholder="Username" name="name" required class="form-control shadow-none text-center">
                            </div>
                            <div class="mb-3">
                                <input type="password" placeholder="Password" name="pass" required class="form-control shadow-none text-center">
                            </div>
                        </div>
                        <button name="login" type="submit" class="btn custom-color shadow-none mb-3">Login</button>
                        <a href="reg.php" class="btn custom-color shadow-none mb-3 ms-4">Register</a>
                    </form>
                </div>
            </div>
data;
        }

    ?>
        
    
        
    

<?php

    if(isset($_POST['login']))
    {
        $frm_data = filteration($_POST);
        
        $query = "SELECT * FROM `admin_cred` WHERE `name` = ? AND `pass` = ?";
        $values = [$frm_data['name'], $frm_data['pass']];

        $res = select($query, $values, "ss");
        if($res->num_rows==1)
        {
            $row = mysqli_fetch_assoc($res);
            session_start();
            $_SESSION['adminLogin'] = true;
            $_SESSION['adminID'] = $row['id'];
            $_SESSION['adminName'] = $row['name'];
            redirect('index.php');
        }
        else
        {
            alertmsg('error', 'Login failed-Invalid Credentials!');
        }
    }

?>

<?php require('inc/footer.php')?>

</body>
</html>