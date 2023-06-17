<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <?php require('inc/links.php');?>
    <title>Library By Shra - Home</title>
    <style>
        .welcome{
            width: 500px;
            height: 500px;
            margin: 60px auto;
        }

        @media screen and (max-width: 350px) {
            .welcome {
                width: 280px;
                height: 505px;
                margin: 10px auto;
            }

            .book{
                height: 100px;
                width: 100px;
            }
    }

        .book{
            animation-duration: 2s;
            animation-delay: 1s;
            animation-iteration-count: 5;
            animation-timing-function: linear;
        }

        .wel{
            animation-duration: 2s;
            animation-delay: 0.5s;
        }
    </style>
</head>
<body>
    <?php require('inc/header.php'); ?>
    <div class="bg-image" style="background-image: url('img/bg/1.webp');">
        <div class="welcome text-center rounded bg-white shadow overflow-hidden">
            <div class="bg-dark text-white"><h4 class="font1 py-3 wel animate__animated animate__fadeInDown fw-bold">Welcome to Library !</h4></div>
            <div class="p-4">
                <div class="mb-5">
                    <h5 class="fw-bold">You can find all the various types of books in this Library</h5>
                </div>
                <div class="mb-5">
                    <p class="fw-bold">Designed and developed, for easy access of the various types of books, and assesment on these books, with their easy management.</p>
                </div>
                <div class="mb-2">
                    <img class="book animate__tada animate__animated" src="img/logo/open-book.png" height="150px" width="150px" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php');?>
</body>
</html>