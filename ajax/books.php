<?php
    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');

    if(isset($_POST['get_books']))
    {
        $res = selectAll('books');
        $i = 1;
        // $path = USERS_IMG_PATH;

        
        $data = "";

        while($row = mysqli_fetch_assoc($res))
        {
            // $del_btn = "<button type='button' onclick='remove_user($row[id])'class='btn btn-danger shadow-none btn-sm'>
            //     <i class='bi bi-trash'></i>
            // </button>";

            // $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

            // if($row['is_verified'] == 1)
            // {
            //     $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
            //     $del_btn = "";
            // }

            if($row['status'] == 1)
            {
                $status = 'Available';
            }
            else
            {
                $status = 'Not Available';
            }


            // $date = date("d-m-Y", strtotime($row['datentime']));

            $data.="
                <tr class='align-middle fw-bold'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[author]</td>
                    <td>$row[edition]</td>
                    <td>$status</td>
                    <td>$row[quantity]</td>
                    <td>$row[department]</td>
                </tr>
            ";
            $i++;
        }

        echo $data;
    }

    if(isset($_POST['search']))
    {
        $frm_data = filteration($_POST);

        $query = "SELECT * FROM `books` WHERE `name` LIKE ? OR `author` LIKE ? OR `edition` LIKE ? OR `status` LIKE ? OR `Department`LIKE ?";
        $res = select($query, ["%$frm_data[name]%", "%$frm_data[name]%", "%$frm_data[name]%", "%$frm_data[name]%", "%$frm_data[name]%"], 'sssss');
        $i = 1;
        // $path = USERS_IMG_PATH;

        
        $data = "";

        if(mysqli_num_rows($res) == 0)
        {
            echo"<b>No Data Found!</b>";
            exit;
        }

        while($row = mysqli_fetch_assoc($res))
        {
            // $del_btn = "<button type='button' onclick='remove_user($row[id])'class='btn btn-danger shadow-none btn-sm'>
            //     <i class='bi bi-trash'></i>
            // </button>";

            // $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

            // if($row['is_verified'] == 1)
            // {
            //     $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
            //     $del_btn = "";
            // }

            // $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>
            //     Active
            // </button>";

            // if(!$row['status'])
            // {
            //     $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>
            //         Inactive
            //     </button>";
            // }

            // $date = date("d-m-Y", strtotime($row['datentime']));

            $data.="
                <tr class='align-middle'>
                <td>$i</td>
                <td>$row[name]</td>
                <td>$row[author]</td>
                <td>$row[edition]</td>
                <td>$row[status]</td>
                <td>$row[quantity]</td>
                <td>$row[department]</td>
                </tr>
            ";
            $i++;
        }

        echo $data;
    }

?>