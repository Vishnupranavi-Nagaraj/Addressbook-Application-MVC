<?php
Class Addresscontroller extends Controller
{
//This add function renders model and a view for addlist page
    public function add()
    {
       $this->Addressmodel=$this->model('Addressmodel');
       if (isset($_GET['country_id']))
       {
            $state_data=$this->Addressmodel->state_db($_GET['country_id']);
            state_dropdown($state_data);
        }else{
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
        $list_value= $display_obj->display_db(ADDRESSTABLE);
        $this->view('list',$list_value);
    }
//This function renders model and a view for updatelist page
    public function update_main($buttonid)
    {
        $this->Addressmodel = $this->model("Addressmodel");
        if (isset($_GET['country_id'])) {
            $state_data=$this->Addressmodel->state_db($_GET['country_id']);
            state_dropdown($state_data);
    }else{
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
            $add_obj=new Addressmodel($this->details);
            $insert=$add_obj->add($name,$address,$city,$age,$country,$state,$_POST['savebutton']);
            if ($insert)
            { 
               redirect("Values inserted Sucessfully",'http://localhost/mvc/public/Addresscontroller/display');
            }else{
                redirect("Values are not inserted Sucessfully",'');
            }
        }
    }
//Setting the values for a delete button in addresslist page
    public function delete()
    {
        if (isset($_POST['stud_delete_multiple_btn']))
        {
            $val=new Addressmodel();
            $all_id = $_POST['stud_delete_id'];
            $extract_id = implode(',' , $all_id);
            $delte=$val->deleterecord($extract_id,$_POST['stud_delete_multiple_btn']);
            if ($delte) {
            redirect("Record Deleted sucessfully",'');
            }else{
                echo "not work";
            }
        }
    }
//Setting the values to a updatelist page
    public function update($id)
    {
        if (isset($_POST['updatebutton']))
        {  
            $name = $_POST['name'];
	        $address = $_POST['address'];
            $city = $_POST['city'];
	        $age = $_POST['age'];
            $country = $_POST['country'];
            $state = $_POST['state'];
            $val=new Addressmodel();
            $updateval=$val->updaterecord($name,$address,$city,$age,$country,$state,$id,$_POST['updatebutton']);
            if ($updateval)
            {
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
        if ($country_value)
        {
            echo "Fetched successfully";
        }
    }
//fetch values from state
    public function state()
    {
        if ($_POST["country_id"])
        {
            $country_id = $_POST["country_id"];
            $valassign=new Addressmodel();
            $country_value=$valassign->state_db($country_id); 
            if ($country_value){
                echo "Fetched successfully";
            }
        }
        else {
        }
    }
    public function nameValidate()
    {
        if (isset($_POST['savebutton']))
        {
            $name = $_POST['name'];
            if ($name == "")
            {
                echo $error_name = "<span class = 'error'>Please enter your Name</span>"; 
            }
        }
    }
    public function addressValidate()
    {
        if (isset($_POST['savebutton']))
        {
            $address = $_POST['address'];
            if ($address == "")
            {
                echo $error_address = "<span class = 'error'>Please enter your address</span>"; 
            }
        }
    }
    public function cityValidate()
    {
        if (isset($_POST['savebutton']))
        {
            $city = $_POST['city'];
            if ($city == "")
            {
                echo $error_city = "<span class = 'error'>Please enter your address</span>"; 
            }
        }
    }
    public function ageValidate()
    {
        if (isset($_POST['savebutton']))
        {
            $age = $_POST['address'];
            if ($age == "")
            {
                echo $error_age = "<span class = 'error'>Please enter your address</span>"; 
            }
        }
    }
    public function countryValidate()
    {
        if (isset($_POST['savebutton']))
        {
            $country= $_POST['address'];
            if ($country == "country")
            {
                echo $error_country = "<span class = 'error'>Please enter your address</span>"; 
            }
        }
    }

}
?>