<div class="container-fluid bg-dark text-light">
    <div class="row p-2">
        <div class="col-lg-4 p-2">
            <h3 class="font1">Library By Shra</h3>
            <p>Library by Shraa is a Library Management System developed for easy management of a library, assigning books and managing students.</p>
        </div>
        <div class="col-lg-4 p-4">
        </div>
    </div>
</div>

<h6 style="opacity: 0.8;" class="text-center bg-light text-dark fw-bold p-3 m-0">Designed and Developed with <i class="bi bi-heart-fill"></i> by Shraa</h6>
<script>

function alertmsg(type, msg, position = 'body')
    {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
        let element = document.createElement('div');
        element.innerHTML = 
        `
        <div class="alert ${bs_class} alert-dismissible fade show role="alert">
            <strong class="me-3">${msg}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;

        if(position == 'body')
        {
            document.body.append(element);
            element.classList.add('custom-alert');
        }
        else
        {
            document.getElementById(position).appendChild(element);
        }

        setTimeout(remAlert, 3000)
    }

    function remAlert()
    {
        document.getElementsByClassName('alert')[0].remove();
    }

    function setActive()
    {
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');

        for(i=0; i<a_tags.length; i++)
        {
            let file = a_tags[i].href.split('/').pop();
            let file_name = file.split('.')[0];

            if(document.location.href.indexOf(file_name) >= 0)
            {
                a_tags[i].classList.add('active');
            }
        }
    }

    setActive();


    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit', (e)=>{
    e.preventDefault();

    let data = new FormData();

    data.append('name',register_form.elements['name'].value);
    data.append('email',register_form.elements['email'].value);
    data.append('phonenum',register_form.elements['phonenum'].value);
    data.append('intro',register_form.elements['intro'].value);
    data.append('pass',register_form.elements['pass'].value);
    data.append('cpass',register_form.elements['cpass'].value);
    data.append('profile',register_form.elements['profile'].files[0]);
    data.append('reg','');

    var myModal = document.getElementById('registerModal');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/loginreg.php", true);
    xhr.onload = function()
    {
        if(this.responseText == 'pass_missmatch')
        {
            alertmsg('error', 'Password Missmatch!');
        }
        else if(this.responseText == 'email_already')
        {
            alertmsg('error', 'Email is already Registered!');
        }
        else if(this.responseText == 'inv_img')
        {
            alertmsg('error', 'Only JPG, WEBP & PNG Images are allowed!');
        }
        else if(this.responseText == 'upd_failed')
        {
            alertmsg('error', 'Image Upload Failed!');
        }
        else if(this.responseText == 'ins_failed')
        {
            alertmsg('error', 'Registration Failed! Server Down!');
        }
        else
        {
            alertmsg('success', 'Registeration Successful!');
            register_form.reset();
        }


    }
    xhr.send(data);

});

    let login_form = document.getElementById('login-form');

    login_form.addEventListener('submit', (e)=>{
        e.preventDefault();

        let data = new FormData();

        data.append('email_name',login_form.elements['email_name'].value);
        data.append('pass',login_form.elements['pass'].value);
        data.append('login','');

        var myModal = document.getElementById('loginModal');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/loginreg.php", true);
        xhr.onload = function()
        {
            if(this.responseText == 'no_reg')
            {
                alertmsg('error', 'Not registered with us!');
            }
            else if(this.responseText == 'invalid_password')
            {
                alertmsg('error', 'Incorrect Password!');
            }
            else
            {
                // let fileurl = window.location.href.split('/').pop().split('?').shift();
                // if(fileurl == 'room_details.php')
                // {
                //     window.location = window.location.href;
                // }
                // else
                {
                    // alertmsg('success', 'Incorrect Password!');
                    window.location = window.location.pathname;
                }

            }
        }
        xhr.send(data);
    });
</script>