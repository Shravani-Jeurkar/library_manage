<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php');?>
    <title>Library By Shra - Feedback</title>
</head>
<body class="bg-image" style="background-image: url('img/bg/4.jpg'); overflow:initial !important;">
<?php require('inc/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">

            <div class="bg-white rounded shadow p-4 mt-4">
                <h4 class="d-inline-block"> For Any Queries</h4>
                <h5 class="mt-4">Call us</h5>
                <a href="tel: +979639514" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i> +979639514
                </a>
                <br>
                <a href="tel: +979639515" class="d-inline-block mb-2 text-decoration-none text-dark">
                    <i class="bi bi-telephone-fill"></i> +979639515
                </a>
                
                <h5 class="mt-4">Email</h5>
                <a href="maitto: jeurkarshravani@gmail.com" class="d-inline-block text-decoration-none text-dark">
                    <i class="bi bi-envelope-fill"></i> jeurkarshravani@gmail.com
                </a>
                
                <h5 class="mt-4">Follow Us</h5>
                <a href="#" class="d-inline-block text-dark fs-5 me-2">
                    <i class="bi bi-twitter me-1"></i>
                </a>              
                <a href="#" class="d-inline-block text-dark fs-5 me-2">
                    <i class="bi bi-facebook me-1"></i>
                </a>
                <a href="#" class="d-inline-block text-dark fs-5">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 px-4 mt-4 mb-4">
            <div class="bg-white rounded shadow p-4">
                <form method="POST">
                    <h4>Send a Message</h4>
                    <div class="mt-4">
                        <label class="form-label" style="font-weight: 500;">Name</label>
                        <input name="name" required type="text" class="form-control shadow-none">
                    </div>
                    <div class="mt-4">
                        <label class="form-label" style="font-weight: 500;">Email</label>
                        <input name="email" required type="email" class="form-control shadow-none">
                    </div>
                    <div class="mt-4">
                        <label class="form-label" style="font-weight: 500;">Subject</label>
                        <input name="subject" required type="text" class="form-control shadow-none">
                    </div>
                    <div class="mt-4">
                        <label class="form-label" style="font-weight: 500;">Message</label>
                        <textarea name="message" required class="form-control shadow-none"  rows="3"></textarea> <!-- add style="resize: none" to cancel resize opt -->
                    </div>
                    <button type="submit" name="send" class="btn custom-color mt-3">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
        if(isset($_POST['send']))
        {
            $frm_data = filteration($_POST);

            $q = "INSERT INTO `feedback`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

            $res = insert($q, $values, 'ssss');
            if($res == 1)
            {
                alertmsg('success', 'Message Sent!');
            }
            else
            {
                alertmsg('error', 'Server Down! Try again Later!');
            }
        }
    
    ?>

<?php require('inc/footer.php');?>
</body>
</html>