<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php');?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <title>Library By Shra - Books</title>
</head>
<body class="bg-image" style="background-image: url('img/bg/2.webp'); overflow:initial !important;">
<?php require('inc/header.php');?>

<div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-11 m-auto p-4 overflow-hidden">
                
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end d-flex align-items-center justify-content-center mb-4">
                            <h3 class="mt-2 font1">Books</h3>
                            <input type="text" oninput="search(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Type to Search..">
                        </div>
                        <div class="table-responsive" style="min-height: 500px;">
                            <table class="table table-hover border border-dark text-center" style="min-width: 1300px;">
                                <thead>
                                    <tr class="bg-dark text-light align-middle">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Edition</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Department</th>
                                    </tr>
                                </thead>
                                <tbody id="books-data">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require('inc/footer.php');?>

<script src="scripts/books.js"></script>
</body>
</html>