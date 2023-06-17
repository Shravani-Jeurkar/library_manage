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
    *{
        overflow:visible !important;
    }
    .login-form{
        width: 500px;
        /* margin: 0, auto; */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* visibility: hidden; comment out this line */

    }

    @media screen and (max-width: 530px) {
        .login-form{
            width: 300px;
            /* margin: 0, auto; */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* visibility: hidden; comment out this line */
        }

        .logo{
            height: 50px;
            margin-top: 1rem!important;
        }

        .box{
            height: 150px;
            width:150px;
            margin-left: 0rem!important;
            margin-top: 0rem!important;
        }

        .con{
            margin-top: -20px !important;
            margin-bottom: -60px;
        }
        
    }

    .box{
            height: 200px;
            width: 200px;
            margin-top: 10rem;

        }

    .con{
        
        margin-top: -50.5px;
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
            <div class="container con px-5 w-500 mx-auto">
                <div class="row d-flex justify-content-center mx-lg-3 my-lg-5 p-3 m-3">

                    <a href="books.php" class="col-3 btn p-2  me-lg-5 mb-5 box rounded shadow" >
                        <div class="container text-center align-items-center">
                            <img src="../img/logo/pencil-square.svg" class="logo mt-3" height="100px">
                            <h4 class="fw-bold mt-3">Edit Book</h4>
                        </div>
                    </a>

                    

                    <a href="feedback.php" class="col-3 btn p-2 ms-5 box  rounded shadow">        
                        <div class="container text-center">
                            <img src="../img/logo/card-text.svg" class="logo mt-2" height="100px">
                            <h4 class="fw-bold mt-3 ">View Feedback</h4>
                        </div>
                    </a>
                </div>
            </div>
            <br><br><br><br>
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