<?php
Class Addresscontroller extends Controller
{
public function index(){
    $this->model('Addressmodel');
    $this->view('add');
}

public function list()
{
    $this->model('Addressmodel');
    $this->view('Addresslist');
 
}
public function update_list($buttonid){
    $this->updatemodel=$this->model('Addressmodel');
    $data=$this->updatemodel->update($buttonid);
    $this->view('edit',$data);
}
public function add()
{
    echo "hlo";
 // if(isset($_POST['savebutton'])) {
    echo "hai";
    $val=new Addressmodel();
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $store=$val->insert($name,$address,$city,$age,$country,$state);
    if($store){
        echo "Success";
       // redirect("Values inserted",'');
    }
    else
    {
        echo "error";
    }

}
public function delete(){
if(isset($_POST['stud_delete_multiple_btn']))
{
    $val=new Addressmodel();
    $all_id = $_POST['stud_delete_id'];
    $extract_id = implode(',' , $all_id);
    $delte=$val->delete($extract_id);
    if($delte){
        echo "Hai";
    }else{
        echo "not work";
    }
}
}
public function update($id){
    if(isset($_POST['updatebutton']))
    {  
     $val=new Addressmodel();
     $name = $_POST['name'];
	 $address = $_POST['address'];
     $city = $_POST['city'];
	 $age = $_POST['age'];
     $country = $_POST['country'];
     $state = $_POST['state']; 
     $updateval=$val->update($name,$address,$city,$age,$country,$state,$id);
     if($updateval){
        echo "Updated success";
     }else{
        echo "not work";
     }


}
}
}

?>