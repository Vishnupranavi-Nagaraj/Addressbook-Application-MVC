<?php
function redirect($msg,$url=''){
    echo "<script type='text/javascript'>alert('$msg');location='$url';</script>";
    
}
