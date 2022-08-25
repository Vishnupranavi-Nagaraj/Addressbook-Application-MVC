const form = document.querySelector('#add');
const namevalue = document.querySelector('#name');
console.log(form)
console.log(namevalue)
const addressvalue = document.querySelector('#address');
const agevalue = document.querySelector('#age');
const cityvalue = document.querySelector('#city');
const countryvalue = document.querySelector('#country-dropdown');
const statevalue = document.querySelector('#state-dropdown');
console.log(statevalue)


form.addEventListener('submit',(event)=>{
  validateForm();
  if(isFormValid()==true)
  {
      form.submit();
  }
  else
  {
      event.preventDefault();
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

  if(namevalue.value.trim()=='')
  {
      setError(namevalue,'Name cannnot be blank');
  }
  else{
      setSuccess(namevalue,"valid Name");
  }
  if(addressvalue.value.trim()=='')
  {
      setError(addressvalue,'Address cannnot be blank');
  }
  else{
      setSuccess(addressvalue,"valid Name");
  }
  if(agevalue.value.trim()=='')
  {
      setError(agevalue,'Age cannnot be blank');
  }
  else{
      setSuccess(agevalue,"valid Name");
  }
  if(cityvalue.value.trim()=='')
  {
      setError(cityvalue,'City cannnot be blank');
  }
  else{
      setSuccess(cityvalue,"valid Name");
  }
  if(countryvalue.selectedIndex == 0)
  {
      setError(countryvalue,'Country cannnot be blank');
  }
  else{
      setSuccess(countryvalue,);
  }
  if(statevalue.selectedIndex == 0)
  {
      setError(statevalue,'State cannnot be blank');
  }
  else{
      setSuccess(statevalue,);
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
