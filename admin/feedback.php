<?php 
    require('inc/links.php');
    adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Library By Shra - Feedback</title>
</head>
<body class="bg-image" style="background-image: url('../img/bg/1.webp'); overflow:initial !important;">
<?php require('inc/header.php'); ?>

<div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 mx-auto p-4 overflow-hidden">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h3 class="mb-4">User Queries</h3>

                        <div class="text-end mb-4">
                        <a href='?seen=all' class='btn custom-color rounded-pill shadow-none btn-sm'>
                            <i class="bi bi-check-all"></i> Mark all read
                        </a>
                        <a href='?del=all' class='btn btn-danger rounded-pill shadow-none btn-sm'>
                            <i class="bi bi-trash3-fill"></i> Delete all
                        </a>

                        </div>
                        
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class=" bg-dark text-light">
                                    <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center" width="20%">Subject</th>
                                    <th scope="col" class="text-center" width="20%">Message</th>
                                    <th scope="col" class="text-center">Date</th>
                                    <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $q = "SELECT * FROM `feedback` ORDER BY `sr_no` DESC";
                                        $data = mysqli_query($con, $q);
                                        $i=1;

                                        while($row = mysqli_fetch_assoc($data))
                                        {
                                            $seen='';
                                            if($row['seen'] != 1)
                                            {
                                                $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Mark as read</a> <br>";
                                            }
                                            $seen.="<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";
                                            echo<<<query
                                                <tr class="text-center">
                                                    <td>$i</td>
                                                    <td>$row[name]</td>
                                                    <td>$row[email]</td>
                                                    <td>$row[subject]</td>
                                                    <td>$row[message]</td>
                                                    <td>$row[date]</td>
                                                    <td>$seen</td>
                                                </tr>
                                            query;
                                            $i++;
                                        }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>
<?php

if(isset($_GET['seen']))
{
    $frm_data = filteration($_GET);

    if($frm_data['seen'] == 'all')
    {
        $q = "UPDATE `feedback` SET `seen`=?";
        $values = [1];
        if(update($q, $values, 'i'))
        {
            redirect('feedback.php');
            alertmsg('success', 'Marked All as Read!');
        }
        else
        {
            alertmsg('error', 'Operation Failed!');
        }
    }
    else
    {
        $q = "UPDATE `feedback` SET `seen`=? WHERE `sr_no`=?";
        $values = [1, $frm_data['seen']];
        if(update($q, $values, 'ii'))
        {
            redirect('feedback.php');
            alertmsg('success', 'Marked as Read!');
        }
        else
        {
            alertmsg('error', 'Operation Failed!');
        }
    }
}

if(isset($_GET['del']))
{
    $frm_data = filteration($_GET);

    if($frm_data['del'] == 'all')
    {
        $q = "DELETE FROM `feedback`";
        if(mysqli_query($con,$q))
        {
            redirect('feedback.php');
            alertmsg('success', 'All Data Deleted!');
        }
        else
        {
            alertmsg('error', 'Operation Failed!');
        }
    }
    else
    {
        $q = "DELETE FROM `feedback` WHERE `sr_no`=?";
        $values = [$frm_data['del']];
        if(delete($q, $values, 'i'))
        {
            redirect('feedback.php');
            alertmsg('success', 'Data Deleted!');
        }
        else
        {
            alertmsg('error', 'Operation Failed!');
        }
    }
}

?>

<?php require('inc/footer.php');?>
</body>
</html>