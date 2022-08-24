var form=document.getElementById('create-account-form');
var emailInput=document.getElementById('email');
var passwordInput=document.getElementById('password');


form.addEventListener('submit',(event)=>{
   
    validateForm();
    if(isFormValid()==true){
      form.submit();
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
// To validate Form fields
function validateForm() {
   
   //email
   if(emailInput.value.trim()==''){
    setError(emailInput,'Provide Email Address');
   }
   else if(isEmailValid(emailInput.value)){
      setSuccess(emailInput);
      localStorage.setItem('unname',emailInput.value);
   }
   else{
    setError(emailInput,'Please enter a Valid Email Address');
   }
     //password
   if(passwordInput.value.trim()==''){
    setError(passwordInput,'Password cannot be Empty');
   }
   else if(passwordInput.value.trim().length<8||passwordInput.value.trim().length>20){
    setError(passwordInput,'Please provide a strong password');
   }
   else{
     setSuccess(passwordInput);
   }
      
}

function setError(element,errorMessage){
  
  const parent=element.parentElement;
  console.log(parent);
  if(parent.classList.contains('success')){
    parent.classList.remove('success');
  } 
  parent.classList.add('error');
  const paragraph=parent.querySelector('p');
  paragraph.textContent=errorMessage;
}
function setSuccess(element){
  const parent=element.parentElement;
  if(parent.classList.contains('error')){
    parent.classList.remove('error');
  }
  parent.classList.add('success');
}

function isEmailValid(email){
  const reg= /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return reg.test(email);
}