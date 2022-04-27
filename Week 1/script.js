console.log("Script loaded!");
const fNameInput = document.getElementById("fname-ip");
const lNameInput = document.getElementById("lname-ip");
const emailInput = document.getElementById("email-ip");
const pwd = document.getElementById("password-ip");
const confirmPwd = document.getElementById("confirm-password-ip");
const regBtn = document.getElementsByClassName("reg-btn")[0];

const nameIsValid = (name) => {
  const nameRegex = /^[a-z]*$/i;
  return nameRegex.test(name);
};

const emailIsValid = (email) => {
  const emailRegex = /.*@[a-z]+\.[a-z]+/i;
  return emailRegex.test(email);
}

const passwordIsValid = (password) => {
  return password.length >= 7;
}

const confirmPasswordIsValid = (pwd1, pwd2) => {
  return pwd1 == pwd2;
}

const submitHandler = () => {
  // First Name validation
  let validity = true;
  if(fNameInput.value === "") {
    fNameInput.classList.remove("success");
    fNameInput.classList.add("error");
    let fnameError = document.getElementById("fname-error");
    fnameError.classList.add("error-active");
    fnameError.innerHTML = "First name cannot be empty";
    validity = false;
  } else if (!nameIsValid(fNameInput.value)) {
    fNameInput.classList.remove("success");
    fNameInput.classList.add("error");
    let fnameError = document.getElementById("fname-error");
    fnameError.classList.add("error-active");
    fnameError.innerHTML = "First name is not valid";
    validity = false;
  } else {
    fNameInput.classList.remove("error");
    fNameInput.classList.add("success");
    document.getElementById("fname-error").classList.remove("error-active");
  }
  // Last Name validation
  if(lNameInput.value === "") {
    lNameInput.classList.remove("success");
    lNameInput.classList.add("error");
    let lnameError = document.getElementById("lname-error");
    lnameError.classList.add("error-active");
    lnameError.innerHTML = "Last name cannot be empty";
    validity = false;
  } else if (!nameIsValid(lNameInput.value)) {
    lNameInput.classList.remove("success");
    lNameInput.classList.add("error");
    let lnameError = document.getElementById("lname-error");
    lnameError.classList.add("error-active");
    lnameError.innerHTML = "Last name is not valid";
    validity = false;
  } else {
    lNameInput.classList.remove("error");
    lNameInput.classList.add("success");
    document.getElementById("lname-error").classList.remove("error-active");
  }
  // Email validation
  if(emailInput.value === "") {
    emailInput.classList.remove("success");
    emailInput.classList.add("error");
    let emailError = document.getElementById("email-error");
    emailError.classList.add("error-active");
    emailError.innerHTML = "Email cannot be empty";
    validity = false;
  } else if (!emailIsValid(emailInput.value)) {
    emailInput.classList.remove("success");
    emailInput.classList.add("error");
    let emailError = document.getElementById("email-error");
    emailError.classList.add("error-active");
    emailError.innerHTML = "Email is not valid";
    validity = false;
  } else {
    emailInput.classList.remove("error");
    emailInput.classList.add("success");
    document.getElementById("email-error").classList.remove("error-active");
  }
  // Pwd1 validation
  if(pwd.value === "") {
    pwd.classList.remove("success");
    pwd.classList.add("error");
    let pwdError = document.getElementById("pwd1-error");
    pwdError.classList.add("error-active");
    pwdError.innerHTML = "Password cannot be empty";
    validity = false;
  } else if (!passwordIsValid(pwd.value)) {
    pwd.classList.remove("success");
    pwd.classList.add("error");
    let pwdError = document.getElementById("pwd1-error");
    pwdError.classList.add("error-active");
    pwdError.innerHTML = "Password is not valid";
    validity = false;
  } else {
    pwd.classList.remove("error");
    pwd.classList.add("success");
    document.getElementById("pwd1-error").classList.remove("error-active");
  }
  // Pwd2 validation
  if(confirmPwd.value === "") {
    confirmPwd.classList.remove("success");
    confirmPwd.classList.add("error");
    let confirmPwdError = document.getElementById("pwd2-error");
    confirmPwdError.classList.add("error-active");
    confirmPwdError.innerHTML = "Password cannot be empty";
    validity = false;
  } else if (!confirmPasswordIsValid(pwd.value, confirmPwd.value)) {
    confirmPwd.classList.remove("success");
    confirmPwd.classList.add("error");
    let confirmPwdError = document.getElementById("pwd2-error");
    confirmPwdError.classList.add("error-active");
    confirmPwdError.innerHTML = "Passwords do not match";
    validity = false;
  } else {
    confirmPwd.classList.remove("error");
    confirmPwd.classList.add("success");
    document.getElementById("pwd2-error").classList.remove("error-active");
  }
  if(validity) {
    const notifier = document.getElementById("notification-panel");
    notifier.classList.add("notification-active");
    // fNameInput.value = "";
    // lNameInput.value = "";
    // emailInput.value = "";
    // pwd.value = "";
    // confirmPwd.value = "";
    setTimeout(() => {
      notifier.classList.remove("notification-active");
    }, 4000);
  }
}

regBtn.addEventListener("click", submitHandler);