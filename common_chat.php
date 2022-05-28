<?php

require 'utilities/common.php';

if($_SESSION['role'] == "Doctor") {
    $action = $_POST['action'];
    $p_id = $_POST['p_id'];
    
    if($action == "add") {
        $prescription = $_POST['prescription'];
    
        $count = 1;
    
        $query1 = "SELECT p1,p2,p3,p4,p5 from prescription WHERE h_id = '$_SESSION[h_id]' && d_id = '$_SESSION[id]' && p_id = '$p_id'";
        $result_query1 = mysqli_query($connect, $query1) or die(mysqli_error($connect));
        $result1 = mysqli_fetch_array($result_query1);
    
    if(mysqli_num_rows($result_query1) == 0) {
        $insert_query = "INSERT into prescription (p_id,h_id,d_id) VALUES ('$p_id','$_SESSION[h_id]','$_SESSION[id]')";
        $query_result = mysqli_query($connect, $insert_query) or die(mysqli_error($connect));
        $id = mysqli_insert_id($connect);
        
        $position = "p".$count;
        
        $update_query = "UPDATE prescription SET $position= '$prescription' WHERE h_id = '$_SESSION[h_id]' && d_id = '$_SESSION[id]' && p_id = '$p_id'";
        $update_result_query = mysqli_query($connect, $update_query) or die(mysqli_error($connect));
        $result = mysqli_fetch_array($update_result_query);
        
        echo $count;
        
        } else {
            
            $prescriptions = array($result1['p1'], $result1['p2'], $result1['p3'], $result1['p4'], $result1['p5']);
        
            foreach ($prescriptions as $value) {
            if($value == "") {
                    $position = "p".$count;
                    $update_query = "UPDATE prescription SET $position= '$prescription' WHERE h_id = '$_SESSION[h_id]' && d_id = '$_SESSION[id]' && p_id = '$p_id'";
                    $update_result_query = mysqli_query($connect, $update_query) or die(mysqli_error($connect));
                    $result = mysqli_fetch_array($update_result_query);
                    echo $count;
                    break;
                } else {
                    $count ++;
                    }
            }   
        }   
    } elseif($action == "delete") {
        $target = $_POST['target'];
        
        $update_query = "UPDATE prescription SET p$target = '' WHERE h_id = '$_SESSION[h_id]' && d_id = '$_SESSION[id]' && p_id = '$p_id'";
        $result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));
    } elseif($action == "answer") {
      $answer = $_POST['answer'];
      
      $update_query = "UPDATE prescription SET answer = '$answer' WHERE h_id = '$_SESSION[h_id]' && d_id = '$_SESSION[id]' && p_id = '$p_id'";
        $result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));
    }  
} elseif ($_SESSION['role'] == "Patient") {
    $action = $_POST['action'];
    $p_id = $_SESSION['id'];
    $h_id = $_POST['h_id'];
    $d_id = $_POST['d_id'];
    
    if($action == "question") {
        $question = $_POST['question'];
        
        $update_query = "UPDATE prescription SET question = '$question' WHERE h_id = '$h_id' && d_id = '$d_id' && p_id = '$p_id'";
        $result = mysqli_query($connect, $update_query) or die(mysqli_error($connect));   
    } elseif($action == "reset") {
        
        $update_query = "UPDATE prescription SET question = '', answer = '' WHERE h_id = '$h_id' && d_id = '$d_id' && p_id = '$p_id'";
        $result = mysqli_query($connect, $update_query) or die(mysqli_error($connect)); 
    }
    
} else {
    header("location: index.php");
}
?>