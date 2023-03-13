<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php');?>
    <title>Admin Register</title>
</head>
<style>
    .reg-form{
        width: 700px;
        margin: 0;
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* visibility: hidden; comment out this line */

    }
</style>
<body>
    <?php require('inc/header.php')?>
    <div class="bg-image" style="background-image: url('../img/bg/2.webp');">

    <div id="reg-form" class="reg-form text-center bg-white shadow rounded overflow-hidden">
            <form method="POST" enctype="multipart/form-data">
                <h4 class="bg-dark text-white py-3 text-center font1">Admin Register</h4>
                <div class="row" >
                    <div class="p-4 col-6">
                        <div class="mb-5">
                            <label class="form-label">Name</label>
                            <input name="name" required type="text" class="form-control shadow-none text-center" placeholder="Name">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Intro</label>
                            <textarea name="intro" class="form-control shadow-none text-center" placeholder="Owner Intro" required rows="1"></textarea>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Password</label>
                            <input name="pass" required type="password" class="form-control shadow-none text-center" placeholder="Password">
                        </div>
                    </div>
                    <div class="p-4 col-6">
                        <div class="mb-5">
                            <label class="form-label">Email</label>
                            <input name="email" required type="text" class="form-control shadow-none text-center" placeholder="Email">
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Profile Pic</label>
                            <input type="file" name="profile" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none text-center" required>
                        </div>
                        <div>
                            <label class="form-label">Confirm Password</label>
                            <input name="cpass" required type="password" class="form-control shadow-none text-center" placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <a name="login" href="index.php" class="btn custom-color shadow-none "><i class="bi bi-arrow-left "></i></a>
                    <button name="reg" type="submit" class="btn custom-color shadow-none ms-4">Register</button>
                </div>
            </form>
        </div>
    </div>

<?php require('inc/footer.php')?>

<?php
    if(isset($_POST['reg']))
    {
        $data = filteration($_POST);

        // Match pass and cpass
        if($data['pass'] != $data['cpass'])
        {
            // echo 'pass_missmatch';
            alertmsg('error', 'Password missmatch!');
            exit;
        }

        // If user exists
        $a_exist = select("SELECT * FROM `admin_cred` WHERE `name` =? AND `email` =? LIMIT 1",
            [$data['email'],$data['name']], "ss");
        
        if(mysqli_num_rows($a_exist) != 0)
        {
            $a_exist_fetch = mysqli_fetch_assoc($a_exist);

            if ($a_exist_fetch['email'] == $data['email'])
            {
                // echo'email_already';
                alertmsg('error', 'This email is already registered!');
                exit;
            }
        }

        $img_r = uploadUserImage($_FILES['profile'], 'admin');

        if($img_r == 'inv_img')
        {
            // echo 'inv_img';
            alertmsg('error', 'Only .jpg, .jpeg, .png & .webp images re allowed!');
            exit;
        }
        elseif($img_r == 'upd_failed')
        {
            // echo 'upd_failed';
            alertmsg('error', 'Sorry, Uploading failed. Issue in the server!');
            exit;
        }

        $query = "INSERT INTO `admin_cred`(`name`,  `intro`, `email`, `profile`, `pass`)
        VALUES (?,?,?,?,?)";
    
        $values = [$data['name'], $data['intro'], $data['email'], $img_r, $data['pass']];

        if(insert($query, $values, 'sssss'))
        {
            redirect('index.php');
            // echo 'success';
        }
        else
        {
            alertmsg('error', 'Server Down!');
            // echo 'ins_failed';
        }

    }


?>
</body>
</html>