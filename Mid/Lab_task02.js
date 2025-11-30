document.addEventListener("click",function() {

const signupform = document.getElementById('signup-form');
const fullnameInput = document.getElementById('fullname');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmpasswordInput = document.getElementById('confirmpassword');
const signupInput = document.getElementById('signup-btn');

const courseInput = document.getElementById('coursename');
const addCourseBtn = document.getElementById('addCourseBtn');
const courseList = document.getElementById('courseList');
const noCourse = document.getElementById('no-courses');
const heading = document.querySelector("#heading-last");


if(fullnameInput.value==="" || emailInput.value===""|| passwordInput.value==="" || confirmpasswordInput.value===""){

    heading.innerHTML="Fillup all fields";
}
if(passwordInput.value.length<8){
    heading.innerHTML="Password must contain 8 character";
}

else{
    heading.innerHTML="Reg successful";
}

const btnReg = document.querySelector("#signup-btn");































}


































)