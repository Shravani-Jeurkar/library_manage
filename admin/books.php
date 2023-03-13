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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <title>Library By Shra - Books</title>
</head>
<body class="bg-image" style="background-image: url('../img/bg/2.webp'); overflow:initial !important;">
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
                        <div class="text-center d-flex align-items-center mb-4">
                            <button type="button" class="btn custom-color shadow-none" data-bs-toggle="modal" data-bs-target="#add-book">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        <div class="table-responsive" style="min-height: 500px;">
                            <table class="table table-hover border text-center" style="min-width: 1300px;">
                                <thead>
                                    <tr class="bg-dark text-light align-middle">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Edition</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Action</th>
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

        <!-- Add Books modal -->

    <div class="modal fade" id="add-book" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="add_book_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Book</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Author</label>
                                <input type="text" name="auth" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Edition</label>
                                <input type="text" name="edition" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Department</label>
                                <input type="text" name="dept" class="form-control shadow-none" >
                            </div>
                        </div>
                        
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" onclick="" class="btn custom-color shadow-none">Submit</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    </div>
<?php require('inc/footer.php');?>

<script src="scripts/books.js"></script>
</body>
</html>