<?php
//jika belom login 

if($_SESSION['log'] = 'true' && strtolower($_SESSION['allowed']) == strtolower($_SESSION['level']) ){

}else{
    header('location:login.php');
}
?>
