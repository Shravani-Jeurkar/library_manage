<?php
  $login = 0;
  if(isset($_SESSION['login']) && $_SESSION['login'] == true)
  {
      $login = 1;
}
?>

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

<?php
    if(isset($_SESSION['login']) && $_SESSION['login'] == true)
    {
        echo<<<data
        <div class="container-fluid" id="main-content">
            <div class="row">
                <div class="col-lg-11 m-auto p-4 overflow-hidden">
                    
                    <div class="card border-0 shadow-sm ">
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
data;
    }
    else
    {
        echo<<<data
        <div class="container-fluid" id="main-content">
            <div class="row">
                <div class="col-lg-11 m-auto p-4 overflow-hidden">
                    
                    <div class="card border-0 shadow-sm ">
                        <div class="card-body">
                            <div class="text-center  align-items-center justify-content-center mb-4">
                                <h3 class="mt-2 font1">Please Login</h3>
                                <h3 class="font1">You have to log in to continue browsing the books...</h3>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
data;
    }
?>
<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-11 m-auto p-4 overflow-hidden">
            
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="text-center  align-items-center justify-content-center mb-4">
                        <h4 class="font1">Here are some Inspiring Quotes to make your day...</h4>
                    </div>
                    
                    <div class="row justify-items-center output">
                        <!-- <div class="card text-capitalize shadow-sm col-3 text-center mx-auto mb-3" >
                            <div class="my-2 fs-4">
                                happiness
                            </div>
                            <div class="card-body fs-3">
                            <p>With supporting text below as a natural lead-in to additional content.</p>
                            <h5 class="text-end">- Author Name</h5>
                            </div>
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('inc/footer.php');?>

<script src="scripts/books.js"></script>
<script>
    var output = document.querySelector(".output");
    let cat = ['happy', 'amazing', 'art', 'beauty'];
    // var category = 'happiness';
    function getQuotes()
    {
        output.innerHTML = 
        `
        <div class="text-center d-flex justify-content-center mt-2">
            <div class="d-flex align-items-center">
                <strong class="me-3">Loading...</strong>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
        </div>
        `;
        
        const url = 'https://api.api-ninjas.com/v1/quotes?limit=3';
        fetch(url,{
            method: 'GET',
            headers: { 'X-Api-Key': 'txaDAS+gCGadD07sLOt+ng==gWR4EaLNHcNOePXO'},
            contentType: 'application/json',
        }).then(function(res){
            return res.text();
        }).then(function(data){
            display(JSON.parse(data));
        }).catch(function(err){
            output.innerHTML = err;
        });

        
    }

    function display(data){
        output.innerHTML = "";
        for (let i = 0; i < 3; i++)
        {
            var obj = data[i];
            output.innerHTML +=
            `
            <div class="card shadow-sm col-lg-3 col-sm-7 col-md-7 text-center mx-auto mb-3">
                <div class="fs-5 text-capitalize">${obj.category}</div>
                <div class="card-body fs-4">
                <p>${obj.quote}</p>
                <h5 class="text-end">- ${obj.author}</h5>
                </div>
            </div>
            `;

            
        }
    }

    getQuotes();
</script>
</body>
</html>