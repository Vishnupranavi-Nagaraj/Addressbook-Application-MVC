<?php
function redirect($msg,$url='')
{
    echo "<script type='text/javascript'>alert('$msg');location='$url';</script>";
    
}

function state_dropdown($state_data)
{
    echo '<option >select state</option>';
        while($row = mysqli_fetch_array($state_data)) {
           echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
        }

}

function update_country_dropdown($ctry_id){

}

