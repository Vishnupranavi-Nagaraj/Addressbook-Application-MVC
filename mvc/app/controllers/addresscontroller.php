<?php

Class Addresscontroller extends Controller
{
//This add function renders model and a view for addlist page
public function add(){
    $this->model('Addressmodel');
    $this->view('add');
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
	$data = $this->Addressmodel->update($buttonid);
	$this->view("edit",$data);
 
}
//we are setting the values to the addlist page
public function add_to_database()
{
 if(isset($_POST['savebutton'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $country = '1';
    $state = '2';
    $add_obj=new Addressmodel();
    $insert_status=$add_obj->add_insert($name,$address,$city,$age,$country,$state);
    if($insert_status){ 
       redirect("Values inserted Sucessfully",'');
    }
    else
    {
        redirect("Values are not inserted Sucessfully",'');
    }

}}
//Setting the values for a delete button in addresslist page
public function delete(){
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
public function update($id){
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
        echo "Updated success";
     }else{
        echo "not work";
     }


}
}
}

?>