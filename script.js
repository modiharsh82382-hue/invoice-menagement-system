function login(event){

    event.preventDefault();

    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    let button = document.querySelector("button");

    if(username==="admin" && password==="admin"){

        button.innerHTML = "Logging in...";
        button.disabled = true;

        setTimeout(function(){

            alert("Login Successful ✅");

            window.location.href = "dashboard.html";

        },1000);

    }else{

        alert("❌ Invalid Username or Password");

    }

}