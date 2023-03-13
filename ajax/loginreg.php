<?php
    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');

    if(isset($_POST['reg']))
    {
        $data = filteration($_POST);

        if($data['pass'] != $data['cpass'])
        {
            echo 'pass_missmatch';
            exit;
        }
        
        $stud_exist = select("SELECT * FROM `stud_cred` WHERE `email` =? AND `name` =? LIMIT 1", [$data['email'], $data['name']], "ss");

        if(mysqli_num_rows($stud_exist) != 0)
        {
            // $stud_exist_fetch = mysqli_fetch_assoc($stud_exist);
            echo 'email_already';
            exit;
        }

        $user = 'std';
        $img_r = uploadUserImage($_FILES['profile'], $user);

        if($img_r == 'inv_img')
        {
            echo 'inv_img';
            exit;
        }
        elseif($img_r == 'upd_failed')
        {
            echo 'upd_failed';
            exit;
        }


        $q = "INSERT INTO `stud_cred`(`name`, `email`, `phonenum`, `profile`, `intro`, `pass`) VALUES (?,?,?,?,?,?)";

        $values = [$data['name'], $data['email'], $data['phonenum'], $img_r, $data['intro'], $data['pass']];

        if(insert($q, $values, 'ssssss'))
        {
            echo 'success';
        }
        else
        {
            echo 'ins_failed';
        }
    }


    if(isset($_POST['login']))
    {
        $data = filteration($_POST);

        $stud_exist = select("SELECT * FROM `stud_cred` WHERE `name` =? OR `email` =?", [$data['email_name'], $data['email_name']], "ss");
        

        if(mysqli_num_rows($stud_exist) == 0)
        {
            echo 'no_reg';
        }
        else
        {
            $stud_exist_fetch = mysqli_fetch_assoc($stud_exist);
            echo($data['pass']);
            echo($stud_exist_fetch['pass']);

            if(($data['pass']!= $stud_exist_fetch['pass']))
                {
                    echo 'invalid_password';
                }
            else
            {
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['sId'] = $stud_exist_fetch['id'];
                $_SESSION['sName'] = $stud_exist_fetch['name'];
                $_SESSION['sPic'] = $stud_exist_fetch['profile'];
                $_SESSION['sPhone'] = $stud_exist_fetch['phonenum'];
                echo 1;
            }
        }


    }

?>