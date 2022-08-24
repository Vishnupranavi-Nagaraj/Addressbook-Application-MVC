<?php
Class Addresscontroller extends Controller
{
   

//This add function renders model and a view for addlist page
public function add()
{
   
       $this->Addressmodel=$this->model('Addressmodel');
       if(isset($_GET['country_id'])){
       $state_data=$this->Addressmodel->state_db($_GET['country_id']);
       state_dropdown($state_data);
}
else{
    $country_data=$this->Addressmodel->country_db();
    $this->view('add',$country_data);
}
}

public function select_state()
{
    $this->Addressmodel=$this->model('Addressmodel');
    $state_data=$this->Addressmodel->state_db($_GET['country_id']);
    $this->view('add',$state_data);    
  
}


//This function renders model and a view for addresslist page
public function display()
{
    $this->model('Addressmodel');
    $display_obj=new Addressmodel();
    $list_value= $display_obj->display_db();
    $this->view('list',$list_value);
}
//This function renders model and a view for updatelist page
public function update_main($buttonid)
{
    $this->Addressmodel = $this->model("Addressmodel");
    if(isset($_GET['country_id'])){
       
        $state_data=$this->Addressmodel->state_db($_GET['country_id']);
        state_dropdown($state_data);
    }
    else{
	$update_data = $this->Addressmodel->update($buttonid);
    $selected_cname = $this->Addressmodel->update_country($update_data['country_id']);
    $country_name = $this->Addressmodel->country_db();
    $selected_state=$this->Addressmodel->update_state($update_data['state_id']);
    $state_name = $this->Addressmodel->state_db($update_data['country_id']);
	$this->view("edit",[$update_data,$selected_cname,$country_name,$selected_state,$state_name]); 
    }   
}
//we are setting the values to the addlist page
public function add_to_database()
{
 if(isset($_POST['savebutton'])) 
 {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $add_obj=new Addressmodel();
    $insert_status=$add_obj->add_insert($name,$address,$city,$age,$country,$state);
    if($insert_status)
    { 
       redirect("Values inserted Sucessfully",'http://localhost/mvc/public/Authcontroller/login');
    }
    else
    {
        redirect("Values are not inserted Sucessfully",'');
    }

}
}
//Setting the values for a delete button in addresslist page
public function delete()
{
if(isset($_POST['stud_delete_multiple_btn']))
{
    $val=new Addressmodel();
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);
    $delte=$val->delete_db($extract_id);
    if($delte){
        redirect("Record Deleted sucessfully",'');
    }else{
        echo "not work";
    }
}
}
//Setting the values to a updatelist page
public function update($id)
{
    if(isset($_POST['updatebutton']))
    {  
     $name = $_POST['name'];
	 $address = $_POST['address'];
     $city = $_POST['city'];
	 $age = $_POST['age'];
     $country = '1';
     $state = '2';
     $val=new Addressmodel();
     $updateval=$val->update_button($name,$address,$city,$age,$country,$state,$id);
     if($updateval){
        //echo "Updated success";
        redirect("Updated","http://localhost/mvc/public/Addresscontroller/display");
     }else{
        echo "not work";
     }
}
}
//fetch values from country
public function country()
{
    $valassign=new Addressmodel();
    $country_value=$valassign->country_db();
    if($country_value)
    {
        echo "Fetched successfully";
    }

}
//fetch values from state
public function state()
{
    
    if($_POST["country_id"]){
    $country_id = $_POST["country_id"];
    $valassign=new Addressmodel();
    $country_value=$valassign->state_db($country_id); 
    if($country_value){
        echo "Fetched successfully";
    }
}
else {

}

}
}
?>