<?php
//Connect to database
require 'connectDB.php';
date_default_timezone_set('Asia/Damascus');
$d = date("Y-m-d");
$t = date("H:i:sa");

if (isset($_POST['FingerID'])) {

    $fingerID = $_POST['FingerID'];

    $sql = "SELECT * FROM jail_guards WHERE fingerprint_id=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select_card";
        exit();
    }
    else{
        // mysqli_stmt_bind_param($result, "s", $fingerID);
        // mysqli_stmt_execute($result);
        // $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)){
            //*****************************************************
            //An existed fingerprint has been detected for Login or Logout
            if ($row['lastname'] != "Lname"){
            	 $lastname = $row['lastname'];
                $Number = $row['serialnumber'];
                $sql = "SELECT * FROM jail_guard_logs WHERE fingerprint_id=? AND checkindate=? AND timeout=''";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_logs";
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($result, "ss", $fingerID, $d);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    //*****************************************************
                    //Login
                    if (!$row = mysqli_fetch_assoc($resultl)){

                        $sql = "INSERT INTO jail_guard_logs (lastname, serialnumber, fingerprint_id, checkindate, timein, timeout) VALUES (?, ?, ?, ?, ?, ?)";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_Select_login1";
                            exit();
                     }
                        else{
                            $timeout = "0";
                            mysqli_stmt_bind_param($result, "sdisss",$lastname, $Number, $fingerID, $d, $t, $timeout);
                            mysqli_stmt_execute($result);

                            echo "login".$lastname;
                            exit();
                        }
                    }
                    //*****************************************************
                    //Logout
                    else{
                        $sql="UPDATE jail_guard_logs SET timeout=? WHERE checkindate=? AND fingerprint_id=? AND timeout='0'";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert_logout1";
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($result, "ssi", $t, $d, $fingerID);
                            mysqli_stmt_execute($result);

                            echo "logout".$Number;
                            exit();
                        }
                    }
                }
            }
            //*****************************************************
            //An available Fingerprint has been detected
            else{
                $sql = "SELECT fingerprint_select FROM jail_guards WHERE fingerprint_select=1";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select";
                    exit();
                }
                else{
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);

                    if ($row = mysqli_fetch_assoc($resultl)) {
                        $sql="UPDATE jail_guards SET fingerprint_select=0";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert";
                            exit();
                        }
                        else{
                            mysqli_stmt_execute($result);

                            $sql="UPDATE jail_guards SET fingerprint_select=1 WHERE fingerprint_id=?";
                            $result = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                echo "SQL_Error_insert_An_available_card";
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($result, "i", $fingerID);
                                mysqli_stmt_execute($result);

                                echo "available";
                                exit();
                            }
                        }
                    }
                    else{
                        $sql="UPDATE jail_guards SET fingerprint_select=1 WHERE fingerprint_id=?";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert_An_available_card";
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($result, "i", $finger_sel, $fingerID);
                            mysqli_stmt_execute($result);

                            echo "available";
                            exit();
                        }
                    }
                }
            }
        }
        //*****************************************************
        //New Fingerprint has been added
        else{
            $creatorID = "000000";
            $firstname = "Fname";
            $lastname = "Lname";
            $middlename = " Mname";
            $address = "Address";
            $cnumber= " 000000";
            $Number = "000000";
            //$Email= " Email";

            $Timein = "00:00:00";
            //$Gender= "Gender";


            $sql="UPDATE jail_guards SET fingerprint_select=0";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo "SQL_Error_insert";
                exit();
            }
            else{
                mysqli_stmt_execute($result);
                $sql = "INSERT INTO jail_guards	( creator_id, firstname, lastname, middlename, address, contact_no, serialnumber, fingerprint_id, fingerprint_select, time_in,del_fingerid, add_fingerid) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?, 0)";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_add";
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($result, "sdssis", $creatorID, $firstname, $lastname, $middlename, $address, $cnumber, $Number, $fingerID, $Timein );
                    mysqli_stmt_execute($result);

                    echo "succesful1";
                    exit();
                }
            }
        }
    }
    //sss
}
if (isset($_POST['Get_Fingerid'])) {

    if ($_POST['Get_Fingerid'] == "get_id") {
        $sql= "SELECT fingerprint_id FROM jail_guards WHERE add_fingerid=1";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        }
        else{
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if ($row = mysqli_fetch_assoc($resultl)) {
                echo "add-id".$row['fingerprint_id'];
                exit();
            }
            else{
                echo "Nothing";
                exit();
            }
        }
    }
    else{
        exit();
    }
}
if (!empty($_POST['confirm_id'])) {

    $fingerid = $_POST['confirm_id'];

    $sql="UPDATE jail_guards SET fingerprint_select=0 WHERE fingerprint_select=1";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select";
        exit();
    }
    else{
        mysqli_stmt_execute($result);

        $sql="UPDATE jail_guards SET add_fingerid=0, fingerprint_select=1 WHERE fingerprint_id=?";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        }
        else{
            mysqli_stmt_bind_param($result, "s", $fingerid);
            mysqli_stmt_execute($result);
            echo "Fingerprint has been added!";
            exit();
        }
    }
}
if (isset($_POST['DeleteID'])) {
    if ($_POST['DeleteID'] == "check") {
        $sql = "SELECT fingerprint_id FROM jail_guards	WHERE del_fingerid=1";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        } else {
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if ($row = mysqli_fetch_assoc($resultl)) {
                echo "del-id".$row['fingerprint_id'];

                $sql = "DELETE FROM jail_guards	WHERE del_fingerid=1";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_delete";
                    exit();
                } else {
                    mysqli_stmt_execute($result);
                    exit();
                }
            } else {
                echo "nothing";
                exit();
            }
        }
    } else {
        exit();
    }
}
mysqli_stmt_close($result);
mysqli_close($conn);
?>
