var name=document.getElementById('name');
var address=document.getElementById('address');
var age=document.getElementById('age');
var city=document.getElementById('city');
var country=document.getElementById('country');
var state=document.getElementById('state');

form.addEventListener('submit',(event)=>{
    validateForm();
    if(isFormValid()==true){
      form.submit();
      //  // ..//
    }else{
       event.preventDefault();
    }
});
// prevent submit form even one field is not valid
function isFormValid(){
  const inputContainers=form.querySelectorAll('.input-group');
  let result=true;
  inputContainers.forEach((container)=>{
    if(container.classList.contains('error')){
      result=false;
    }
  });
  return result;

}
function validateForm() {
   
    //email
    if(emailInput.value.trim()==''){
     setError(emailInput,'Provide Email Address');
    }
    else if(isEmailValid(emailInput.value)){
       setSuccess(emailInput);
    }
    else{
     setError(emailInput,'Please enter a Valid Email Address');
    }
}

