const togglePassword = document.querySelector("#toggle");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
  // toggle the type attribute
  const type = password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("bi-eye");
});

//---------------------------------- user logout--------------------------------------

function over(i) {
  if(document.getElementById(i).style.visibility=='visible'){
    document.getElementById(i).style.visibility='hidden';
  }
  else
  document.getElementById(i).style.visibility="visible";
}