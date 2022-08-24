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
  // alert('hello');
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
  alert('hello');

  if(namevalue.value.trim()=='')
  {
      setError(namevalue,'Name cannnot be blank');
  }
  else{
      setSuccess(namevalue,"valid Name");
  }
  if(emailInput.value.trim()=='')
  {
      setError(emailInput,"Email cannot be blank");
  }
  else if(!isEmail(emailInput.value))
  {
      setError(emailInput,"Not a valid Email ID");
  }
  else
  {
      setSuccess(emailInput,"Valid Email");
  }
  if(passwordInput.value.trim()=='')
  {
      setError(passwordInput,"Password cannot be blank");
  }
  else if(!isPassword(passwordInput.value))
  {
      setError(passwordInput,"Not a valid password");
  }
  else{
      setSuccess(passwordInput,"Valid Password");
  }
  if(confirmpasswordInput.value.trim()=='')
  {
      setError(confirmpasswordInput,"Password cannot be empty");
  }
  else if((confirmpasswordInput.value )!=(passwordInput.value))
  {
      setError(confirmpasswordInput,"Password does not match");
  }
  else 
  {
      setSuccess(confirmpasswordInput,"password matched");
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
function isUserName(rolename)
{
  const rolenamePattern = /^[a-zA-Z\._-]+$/;
  return rolenamePattern.test(rolename);
}
function isEmail(email)
{
  const emailPattern = /^([a-zA-Z0-9]{5,20})+@([a-zA-Z]{3,5})+\.([a-zA-Z\.]{3,10})+$/;
  return emailPattern.test(email);
}
function isPassword(password)
{
  const passwordPattern = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  return passwordPattern.test(password);
}
function isConfirmPassword(confirmpassword)
{
  const confirmpasswordPattern = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  return confirmpasswordPattern.test(confirmpassword);
}