function updateFullName(){
let fname=document.getElementById("first_name").value;
let lname=document.getElementById("last_name").value;
document.getElementById("full_name").value=fname.concat(" ",lname);
}