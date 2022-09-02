const form = document.querySelector('#edit');
const namevalue = document.querySelector('#name');
const addressvalue = document.querySelector('#address');
const agevalue = document.querySelector('#age');
const cityvalue = document.querySelector('#city');
const countryvalue = document.querySelector('#country-dropdown');
const statevalue = document.querySelector('#state-dropdown');

edit.addEventListener('submit',(event)=>{
    event.preventDefault();

    validateForm();
    if(isFormValid()==true)
    {
        form.submit();
    }else {
        return false;
    }
});

function isFormValid()
{
  const inputContainers = form.querySelectorAll('.form-group')
  let result = true;
  inputContainers.forEach((container)=>{
  if(container.classList.contains('error'))
  {
          result = false;
  }
  })
  return result;
}
function validateForm(){
  if(namevalue=='')
  {
      setError(namevalue,'Name cannnot be blank');
  }
  else if(namevalue.value.trim().length<4||namevalue.value.trim().length>30)
  {
      setError(namevalue,'Name should be greater than 4 letters');
  }
  else{
      setSuccess(namevalue);
  }
  if(addressvalue.value=='')
  {
      setError(addressvalue,'Address cannnot be blank');
  }
  else if(addressvalue.value.length<15||addressvalue.value.length>190)
  {
      setError(addressvalue,'Please provide your complete address');
   }
  else{
      setSuccess(addressvalue);
  }
  if(agevalue.value=='')
  {
      setError(agevalue,'Age cannnot be blank');
  }
  else if(isNaN(agevalue.value))
  {
    setError(agevalue,'Should be Only numbers');
  }
  else if(agevalue.value<1 || agevalue.value>100){
        setError(agevalue,'Age cannnot be blank');
  }
  else{
      setSuccess(agevalue);
  }
  if(cityvalue.value.trim()=='')
  {
      setError(cityvalue,'City cannnot be blank');
  }
  else if(cityvalue.value.trim().length<5||cityvalue.value.trim().length>30)
  {
      setError(cityvalue,'Please provide proper city name');
   }
  else{
      setSuccess(cityvalue);
  }
  if(countryvalue.value == 0)
  {
      setError(countryvalue,'Country cannnot be blank');
  }
  else{
    setSuccess(countryvalue);
    }
}
function setError(element,errorMessage)
{
  const parent = element.parentElement;
  parent.classList.add('error');
  if(parent.classList.contains('success'))
  {
        parent.classList.remove('success');
  }
  const message = parent.querySelector('p');
  message.textContent = errorMessage;
}
function setSuccess(element,successMessage)
{
  const parent = element.parentElement;
  parent.classList.add('success');
  if(parent.classList.contains('error'))
  {
      parent.classList.remove('error');
  }
  const message = parent.querySelector('p');
  message.textContent=successMessage;
}

