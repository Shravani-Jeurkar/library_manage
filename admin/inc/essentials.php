<?php

    //Frontend Data

    define('SITE_URL', 'http://127.0.0.1/librarybyshra/');
    // define('ABOUT_IMG_PATH',SITE_URL.'Images/about/');
    // define('CAROUSEL_IMG_PATH',SITE_URL.'Images/carousel/');
    // define('Facilities_IMG_PATH',SITE_URL.'Images/facilities/');
    // define('ROOMS_IMG_PATH',SITE_URL.'Images/rooms/');
    define('USERS_IMG_PATH',SITE_URL.'img/users/');
    define('ADMIN_IMG_PATH',SITE_URL.'img/admin/');


    // Backend Data

    define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/librarybyshra/img/');
    // define('ABOUT_FOLDER','about/');
    // define('CAROUSEL_FOLDER','carousel/');
    // define('Facilities_FOLDER','facilities/');
    // define('ROOMS_FOLDER','rooms/');
    define('USERS_FOLDER','users/');
    define('ADMIN_FOLDER','admin/');


    function redirect ($url)
    {
        echo"<script>
            window.location.href = '$url';
        </script>";
    }
    
    function adminLogin()
    {
        session_start();
        if(!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true))
        {
            echo"<script>
                window.location.href = 'index.php';
            </script>";
        }
        // session_regenerate_id(true);
        
    }

    function alertmsg($type, $msg)
    {
        $bs_class = ($type == "success") ? "alert-success": "alert-danger";
        echo<<<alert
            <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                <strong class="me-3">$msg</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        alert;
    }


    function uploadUserImage($image, $user)
    {
        $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
        $img_mime = $image['type'];

        if(!in_array($img_mime, $valid_mime))
        {
            return 'inv_img'; //Invalid Image or format
        }
        else
        {
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
            $rname = 'IMG_' .random_int(11111, 99999).".jpeg";

            if($user == 'std')
            {
                $img_path = UPLOAD_IMAGE_PATH.USERS_FOLDER.$rname;
            }
            else
            {
                $img_path = UPLOAD_IMAGE_PATH.ADMIN_FOLDER.$rname;
            }

            if($ext == 'png' || $ext == 'PNG')
            {
                $img = imagecreatefrompng($image['tmp_name']);
            }
            else if($ext == 'webp' || $ext == 'WEBP')
            {
                $img = imagecreatefromwebp($image['tmp_name']);
            }
            else
            {
                $img = imagecreatefromjpeg($image['tmp_name']);
            }

            if(imagejpeg($img, $img_path, 75))
            {
                return $rname;
            }
            else
            {
                return 'upd_failed';
            }
        }
    }


?>