//container form
const signIn = document.getElementById("signIn");
const signUp = document.getElementById("signUp");

//btn
const loginBtn = document.querySelectorAll("#loginBtn");
const registerBtn = document.querySelector("#registerBtn");
const closeBtn = document.querySelectorAll("#close");

loginBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        signUp.classList.remove('active');
        signIn.classList.add("active");
    });
});

registerBtn.addEventListener("click", () => {
    signIn.classList.remove("active");
    signUp.classList.add('active');
});

closeBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        signUp.classList.remove('active');
        signIn.classList.remove("active");
    });
});