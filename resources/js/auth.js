let eye = document.querySelector("#eye");
let password = document.querySelector("#password");

let eyeConfirm = document.querySelector("#eye_confirmation");
let passwordConfirm = document.querySelector("#password_confirmation");

eye.addEventListener('click', ()=>{
  if (password.type == 'password') {
    eye.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    password.type ='text';
  } else {
    eye.innerHTML = '<i class="fa-solid fa-eye"></i>';
    password.type ='password';
  }
})

eyeConfirm.addEventListener('click', ()=>{
  if (passwordConfirm.type == 'password') {
    eyeConfirm.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
    passwordConfirm.type ='text';
  } else {
    eyeConfirm.innerHTML = '<i class="fa-solid fa-eye"></i>';
    passwordConfirm.type ='password';
  }
})