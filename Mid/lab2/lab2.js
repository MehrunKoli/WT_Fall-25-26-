function toogle()
{
    let body = document.body;
    let title = document.getElementById("pagetitle");
    let button = document.getElementById("btn01");

 if(body.style.backgroundColor === "black")
 {
    body.style.backgroundColor = "white";
    title.style.color = "black";
    title.innerHTML = "Light Mode";
    button.innerHTML = "Switch to Dark Mode";
 }

 else{
    body.style.backgroundColor = "black";
    title.style.color = "white";
    title.innerHTML = "Dark Mode";
    button.innerHTML = "Switch to Light Mode"
 }

}