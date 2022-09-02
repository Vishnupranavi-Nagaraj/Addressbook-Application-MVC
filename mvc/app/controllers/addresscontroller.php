<?php
Class Addresscontroller extends Controller
{
    /**
     * Add function which can render the model and a view page
     */
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
    /**
     * select_state function which get the values of country and then view according to the state id
     */
    public function select_state()
    {
        $this->Addressmodel=$this->model('Addressmodel');
        $state_data=$this->Addressmodel->state_db($_GET['country_id']);
        $this->view('add',$state_data);    
    }
    /**
     * display function displays all the records in the addresstable connection between a model and a view page
     */
    public function display()
    {
        $this->model('Addressmodel');
        $display_obj=new Addressmodel();
        $list_value= $display_obj->display_db(ADDRESSTABLE);
        $this->view('list',$list_value);
    }
    
    /**
     * update_main function renders the connection between model and a view page
     */
    public function update_main($buttonid)
    {
        $this->Addressmodel = $this->model("Addressmodel");
        if (isset($_GET['country_id'])) {
            $state_data=$this->Addressmodel->state_db($_GET['country_id']);
            state_dropdown($state_data);
        } else {
	        $update_data = $this->Addressmodel->update($buttonid);
            $selected_cname = $this->Addressmodel->update_country($update_data['country_id']);
            $country_name = $this->Addressmodel->country_db();
            $selected_state = $this->Addressmodel->update_state($update_data['state_id']);
            $state_name = $this->Addressmodel->state_db($update_data['country_id']);
	        $this->view("edit",[$update_data,$selected_cname,$country_name,$selected_state,$state_name]); 
        }   
    }
    
    /**
     * add_to-database fetch the id from the view page and sents to the model
     */
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
            $insert=$add_obj->add($name,$address,$city,$age,$country,$state,$_POST['savebutton']);
            if ($insert)
            { 
            $_SESSION['status']="Values Inserted";
              redirect($_SESSION['status'], BASEURL."Addresscontroller/display");
               
            }else{
            $_SESSION['status']="Values Not Inserted";
              redirect($_SESSION['status'], BASEURL."Addresscontroller/display");
            }
        }
    }
    
    /**
     * delete fetch the id from the view page and sents to the model
     */
    public function delete()
    {
        if (isset($_POST['stud_delete_multiple_btn']))
        {
            $val=new Addressmodel();
            $all_id = $_POST['stud_delete_id'];
            $extract_id = implode(',' , $all_id);
            $delte=$val->deleterecord($extract_id,$_POST['stud_delete_multiple_btn']);
            if ($delte) {
                $_SESSION['status']="Record Deleted sucessfully";
                redirect($_SESSION['status'], BASEURL."Addresscontroller/display");
            
            }else{
                $_SESSION['status']="Failed to delete";
                redirect($_SESSION['status'], BASEURL."Addresscontroller/display");
            }
        }
    }
     /**
     * update fetch the id from the view page and sents to the model
     * @param $id is used to fetch the value
     */
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
                $_SESSION['status']="Record Updated sucessfully";
                redirect($_SESSION['status'], BASEURL."Addresscontroller/display");
            
            }else{
                $_SESSION['status']="Record Not Updated";
                redirect($_SESSION['status'], BASEURL."Addresscontroller/display");
            }
        }
    }
     /**
     * This function can be used to check for the Country table
     */
    public function country()
    {
        $valassign=new Addressmodel();
        $country_value=$valassign->country_db();
        if ($country_value)
        {
            echo "Fetched successfully";
        }
    }
     /**
     * This function can be used to check for the State table
     */
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
     /**
     * This function used for the validation of name in the view page
     */
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
    /**
     * This function used for the validation of address in the view page
     */
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
    /**
     * This function used for the validation of city in the view page
     */
    public function cityValidate()
    {
        if (isset($_POST['savebutton'])){
            $city = $_POST['city'];
            if ($city == "")
            {
                echo $error_city = "<span class = 'error'>Please enter your address</span>"; 
            }
        }
    }
    /**
     * This function used for the validation of age in the view page
     */
    public function ageValidate(){
        if (isset($_POST['savebutton']))
        {
            $age = $_POST['address'];
            if ($age == "")
            {
                echo $error_age = "<span class = 'error'>Please enter your age</span>"; 
            }
        }
    }
    /**
     * This function used for the validation of country in the view page
     */
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