var namevalue=document.getElementById('name');
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
    if(namevalue.value.trim()==''){
     setError(namevalue,'Provide Email Address');
    }
    else{
       setSuccess(namevalue);
    }
    
    //address
    if(address.value.trim()==''){
      setError(address,'Provide address');
     }
     else{
        setSuccess(address);
     }
     //city
     if(city.value.trim()==''){
      setError(city,'Provide city name');
     }
     else{
        setSuccess(city);
     }
      //age
      if(age.value.trim()==''){
        setError(age,'Provide city name');
       }
       else{
          setSuccess(age);
       }
        //country
      if(country.value.trim()==''){
        setError(country,'Provide country name');
       }
       else{
          setSuccess(country);
       }
         //country
      if(state.value.trim()==''){
        setError(state,'Provide state name');
       }
       else{
          setSuccess(state);
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
}

