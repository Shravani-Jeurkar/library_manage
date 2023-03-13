<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');

    if(isset($_POST['get_books']))
    {
        $res = selectAll('books');
        $i = 1;
        // $path = USERS_IMG_PATH;

        
        $data = "";

        while($row = mysqli_fetch_assoc($res))
        {
            $del_btn = "<button type='button' onclick='remove_book($row[b_id])'class='btn btn-danger shadow-none btn-sm'>
                <i class='bi bi-trash'></i>
            </button>";

            // $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

            // if($row['is_verified'] == 1)
            // {
            //     $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
            //     $del_btn = "";
            // }

            $status = "<button onclick='toggle_status($row[b_id],0)' class='btn btn-dark btn-sm shadow-none'>
                Active
            </button>";

            if($row['status'] == 0)
            {
                $status = "<button onclick='toggle_status($row[b_id],1)' class='btn btn-danger btn-sm shadow-none'>
                    Inactive
                </button>";
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
                    <td>$del_btn</td>
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
            $del_btn = "<button type='button' onclick='remove_book($row[b_id])'class='btn btn-danger shadow-none btn-sm'>
                <i class='bi bi-trash'></i>
            </button>";

            // $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

            // if($row['is_verified'] == 1)
            // {
            //     $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
            //     $del_btn = "";
            // }

            $status = "<button onclick='toggle_status($row[b_id],0)' class='btn btn-dark btn-sm shadow-none'>
                Active
            </button>";

            if($row['status'] == 0)
            {
                $status = "<button onclick='toggle_status($row[b_id],1)' class='btn btn-danger btn-sm shadow-none'>
                    Inactive
                </button>";
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
                    <td>$del_btn</td>
                </tr>
            ";
            $i++;
        }

        echo $data;
    }

    if(isset($_POST['add_book']))
    {        
        $frm_data = filteration($_POST);

        $res = select("SELECT * FROM `books` WHERE `name` =? AND `author` =? AND `edition` =? AND  `department` =?",[$frm_data['name'],$frm_data['auth'],$frm_data['edition'],$frm_data['dept']],"ssss");
        
        if(mysqli_num_rows($res)!= 0)
        {
            $row = mysqli_fetch_assoc($res);
            $quantity = $row['quantity'] + $frm_data['quantity'];
            $q1 = "UPDATE `books` SET `quantity`=? WHERE `b_id` =?";
            $v = [$quantity, $row['b_id']];
            if(update($q1, $v, 'ii'))
            {
                echo 'quantity_upd';
            }
            
        }
        else
        {

            $q2 = "INSERT INTO `books` (`name`, `author`, `edition`, `quantity`, `department`) VALUES (?,?,?,?,?)";
            $values = [$frm_data['name'],$frm_data['auth'],$frm_data['edition'],$frm_data['quantity'],$frm_data['dept']];

            if(insert($q2, $values, 'sssis'))
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }

    }

    if(isset($_POST['toggle_status']))
    {
        $frm_data = filteration($_POST);

        $q = "UPDATE `books` SET `status`=? WHERE `b_id`=?";
        $v = [$frm_data['value'] ,$frm_data['toggle_status']];

        if(update($q, $v, 'ii'))
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    if(isset($_POST['remove_book']))
    {
        $frm_data = filteration($_POST);

        $data = select("SELECT * FROM `books` WHERE  `b_id` =?",[$frm_data['book_id']],"i");
        $row = mysqli_fetch_assoc($data);
        
        if($row['quantity'] > 1)
        {
            $quantity = $row['quantity'] - 1;
            $q1 = "UPDATE `books` SET `quantity`=? WHERE `b_id` =?";
            $v = [$quantity, $row['b_id']];
            if(update($q1, $v, 'ii'))
            {
                echo 'quqntity_decreased';
            }
        }
        else
        {
            $res = delete("DELETE FROM `books` WHERE `b_id` = ?", [$frm_data['book_id']], 'i');

            if($res)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
    }

    

?>