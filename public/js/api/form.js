function validateLogin() {
  let form = document.querySelector("#login-form");
  let textUsername = document.querySelector(".login-error-username");
  let textPassword = document.querySelector(".login-error-password");
  textUsername.innerHTML = "";
  textPassword.innerHTML = "";
  let errorUsername = validateUsername(form.username.value);
  let errorPassword = validatePassword(form.password.value);
  if (errorUsername == "" && errorPassword == "") return true;
  else {
    textUsername.innerHTML = errorUsername;
    textPassword.innerHTML = errorPassword;
    return false;
  }
}
function fetchLogin() {
  const loginForm = document.querySelector("#login-form");
  let loginError = document.querySelector(".login-error");
  if (loginForm != null) {
    loginForm.addEventListener("submit", async (event) => {
      event.preventDefault();
      loginError.innerHTML = "";
      if (validateLogin() == true) {
        const formData = new FormData(loginForm);
        const response = await fetch("/login", {
          method: "post",
          body: formData,
        });

        if (response.ok) {
          const result = await response.json();
          if (result == true) {
            window.location = "/";
          } else {
            loginError.innerHTML = "Tài khoản hoặc mật khẩu không chính xác";
          }
        }
      }
    });
  }
}
fetchLogin();

function validateRegister() {
  let form = document.querySelector("#register-form");
  let textFullName = document.querySelector(".register-error-full_name");
  let textUsername = document.querySelector(".register-error-username");
  let textEmail = document.querySelector(".register-error-email");
  let textPhone = document.querySelector(".register-error-phone");
  let textAddress = document.querySelector(".register-error-address");
  let textPassword = document.querySelector(".register-error-password");
  let textRepeatPassword = document.querySelector(
    ".register-error-repeat_password"
  );
  let textGender = document.querySelector(".register-error-gender");
  textFullName.innerHTML =
    textUsername.innerHTML =
    textEmail.innerHTML =
    textPhone.innerHTML =
    textAddress.innerHTML =
    textPassword.innerHTML =
    textRepeatPassword.innerHTML =
    textGender.innerHTML =
      "";
  let errorFullName = validateName(form.full_name.value);
  let errorUsername = validateUsername(form.username.value);
  let errorEmail = validateEmail(form.email.value);
  let errorPhone = validatePhone(form.phone.value);
  let errorAddress = validateRequired(form.address.value);
  let errorPassword = validatePassword(form.password.value);
  let errorRepeatPassword = validateMatch(
    form.password.value,
    form.repeat_password.value,
    "Mật khẩu"
  );
  let errorGender = validateRequired(form.gender.value);
  if (
    errorFullName == "" &&
    errorUsername == "" &&
    errorEmail == "" &&
    errorPhone == "" &&
    errorAddress == "" &&
    errorPassword == "" &&
    errorRepeatPassword == "" &&
    errorGender == ""
  )
    return true;
  else {
    textFullName.innerHTML = errorFullName;
    textUsername.innerHTML = errorUsername;
    textEmail.innerHTML = errorEmail;
    textPhone.innerHTML = errorPhone;
    textAddress.innerHTML = errorAddress;
    textPassword.innerHTML = errorPassword;
    textRepeatPassword.innerHTML = errorRepeatPassword;
    textGender.innerHTML = errorGender;
    return false;
  }
}
function fetchRegister() {
  const registerForm = document.querySelector("#register-form");
  let registerError = document.querySelector(".register-error");
  if (registerForm != null) {
    registerForm.addEventListener("submit", async (event) => {
      registerError.innerHTML = "";
      if (validateRegister()) {
        event.preventDefault();

        const formData = new FormData(registerForm);
        formData.delete("repeat_password");
        const response = await fetch("/register", {
          method: "post",
          body: formData,
        });

        if (response.ok) {
          const result = await response.json();
          if (result == true) {
            console.log("abc");
            window.location = "/login";
          } else {
            registerError.innerHTML = "";
            result.forEach((element) => {
              registerError.innerHTML += element;
              registerError.innerHTML += "<br>";
            });
          }
        }
      }
    });
  }
}
fetchRegister();

function validateChangePass() {
  let form = document.querySelector("#change-pass-form");
  let changePassError = document.querySelector(".change-pass-error");
  let textUsername = document.querySelector(".change-error-username");
  let textOldPassword = document.querySelector(".change-error-old_password");
  let textPassword = document.querySelector(".change-error-password");
  let textRepeatPassword = document.querySelector(
    ".change-error-repeat_password"
  );
  textUsername.innerHTML =
    textOldPassword.innerHTML =
    textPassword.innerHTML =
    textRepeatPassword.innerHTML =
    changePassError.innerHTML =
      "";
  let errorUsername = validateUsername(form.username.value);
  let errorOldPassword = validatePassword(form.old_password.value);
  let errorPassword = validatePassword(form.password.value);
  let errorRepeatPassword = validateMatch(
    form.password.value,
    form.rpassword.value,
    "Mật khẩu"
  );
  if (
    errorUsername == "" &&
    errorOldPassword == "" &&
    errorPassword == "" &&
    errorRepeatPassword == ""
  )
    return true;
  else {
    textUsername.innerHTML = errorUsername;
    textOldPassword.innerHTML = errorOldPassword;
    textPassword.innerHTML = errorPassword;
    textRepeatPassword.innerHTML = errorRepeatPassword;
    return false;
  }
}
function fetchChangePass() {
  const changePassForm = document.querySelector("#change-pass-form");
  let changePassError = document.querySelector(".change-pass-error");
  if (changePassForm != null) {
    changePassForm.addEventListener("submit", async (event) => {
      if (validateChangePass()) {
        event.preventDefault();

        const formData = new FormData(changePassForm);
        formData.delete("rpassword");
        const response = await fetch("/change-password", {
          method: "post",
          body: formData,
        });

        if (response.ok) {
          const result = await response.json();
          if (result == true) {
            console.log("abc");
            window.location = "/login";
          } else {
            changePassError.innerHTML = "";
            changePassError.innerHTML = result;
          }
        }
      }
    });
  }
}
fetchChangePass();

function validateForgotPass() {
  const forgotPassForm = document.querySelector("#forgot-pass-form");
  let forgotPassError = document.querySelector(".forgot-pass-error");
  if (forgotPassForm != null) {
    forgotPassForm.addEventListener("submit", async (event) => {
      forgotPassError.innerHTML = "Vui lòng đợi";
      event.preventDefault();
      const formData = new FormData(forgotPassForm);
      const response = await fetch("/forgot-password", {
        method: "post",
        body: formData,
      });

      if (response.ok) {
        const result = await response.json();
        forgotPassError.setAttribute("style", "color: green;");
        forgotPassError.innerHTML = result;
      }
    });
  }
}
validateForgotPass();

function validateResetPass() {
  let form = document.querySelector("#reset-pass-form");
  let textPassword = document.querySelector(".reset-error-password");
  let textRepeatPassword = document.querySelector(".reset-error-rpassword");
  textPassword.innerHTML = textRepeatPassword.innerHTML = "";
  let errorPassword = validatePassword(form.password.value);
  let errorRepeatPassword = validateMatch(
    form.password.value,
    form.rpassword.value,
    "Mật khẩu"
  );
  if (errorPassword == "" && errorRepeatPassword == "") {
    return true;
  } else {
    textPassword.innerHTML = errorPassword;
    textRepeatPassword.innerHTML = errorRepeatPassword;
    return false;
  }
}

const resetPassForm = document.querySelector("#reset-pass-form");
let resetPassError = document.querySelector(".reset-pass-error");

if (resetPassForm != null) {
  resetPassForm.addEventListener("submit", async (event) => {
    resetPassError.innerHTML = "";
    if (validateResetPass()) {
      event.preventDefault();

      const formData = new FormData(resetPassForm);
      formData.delete("rpassword");
      const response = await fetch("/reset-password", {
        method: "post",
        body: formData,
      });

      if (response.ok) {
        const result = await response.json();
        if (result === true) {
          window.location = "/login";
        } else {
          resetPassError.innerHTML = result;
        }
      }
    }
  });
}
