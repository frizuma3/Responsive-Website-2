
function validateForm(){
    var inputValid = true;
    var email=document.Login.email.value;
    var password=document.Login.password.value;

    //email is length 0 or no @ symbol
    if(email == "" || password == ""){
        alert("You have to input  email and password to continue."); 
        inputValid = false;
        return inputValid;
    }
    else{
        alert("Input successful, click 'OK' to check in the database.");
        inputValid = true;
        return  inputValid;
    }
}

/* <script> */
// function myFunction() {
//   var x = document.getElementById("myTopnav");
//   if (x.className === "topnav") {
//     x.className += " responsive";
//   } else {
//     x.className = "topnav";
//   }
// }
// </script>