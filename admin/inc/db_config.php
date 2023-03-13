<?php
$host = 'localhost';
$user_name = 'root';
$pass = '';
$dataBase = 'lib_byshra';

$con = mysqli_connect($host, $user_name, $pass, $dataBase);

if (!$con) {
    die("Database Connection Failed!! Error is:".mysqli_connect_error());
}

    function filteration ($data)
    {
        foreach($data as $key => $value)
        {
            $value = stripslashes($value);
            $value = trim($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $data[$key] = $value;
        }
        return $data;
    }

    function select ($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con, $sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if (mysqli_stmt_execute($stmt))
            {
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Select");
            }
            


        }
        else{
            die("Query cannot be prepared - Select");
        }

    }

    function selectAll($table)
    {
        $con = $GLOBALS['con'];
        $res = mysqli_query($con, "SELECT * FROM $table");
        return $res;
    }

    function update ($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con, $sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if (mysqli_stmt_execute($stmt))
            {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update");
            }
            
        }
        else{
            die("Query cannot be prepared - Update");
        }

    }

    function insert ($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con, $sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if (mysqli_stmt_execute($stmt))
            {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Insert");
            }
            
        }
        else{
            die("Query cannot be prepared - Insert");
        }

    }

    function delete ($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if($stmt = mysqli_prepare($con, $sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if (mysqli_stmt_execute($stmt))
            {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Delete");
            }
            
        }
        else{
            die("Query cannot be prepared - Delete");
        }

    }

?>