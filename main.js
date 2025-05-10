let topbox=document.getElementById("topbox");
let leaderboard=document.getElementById("leaderboard");
const logInPopup=document.getElementById("LogInPopup");
const signInOpen = document.querySelector("#signIn");
const logInOpen = document.querySelector("#logIn");
const signInPopup = document.querySelector("#signInPopup");
const closeSignInButton = document.querySelector("#closeSignIn");
const closeLogInButton = document.querySelector("#closeLogIn");
const dropdown = document.querySelector(".dropdown");



leaderboard.addEventListener("click",function(){
    if(topbox.style.display==="flex")
    {
        topbox.style.display="none";
    topbox.classList.add("animate3");
    }
    
else{
    topbox.style.display="flex";
    topbox.classList.add("animate1");
    fetch('toplist.php')
            .then(response => response.text())
            .then(data => {
               
                document.getElementById('topbox-content').innerHTML = data;
            })
            .catch(error => console.error('Error loading the leaderboard:', error));
    
}
});

signInOpen.addEventListener("click", function(){
    if(logInPopup.style.display !=="flex"){
    signInPopup.style.display = "flex";
    

    }
    
console.log("Sign In Dialog opened");

});
logInOpen.addEventListener("click", function(){
    if(signInPopup.style.display !=="flex"){
   
    logInPopup.style.display = "flex";
    
    }
    
console.log("log In Dialog opened");

});
closeSignInButton.addEventListener("click", () => {
    signInPopup.style.display = "none";
    console.log("Sign In Dialog closed");
});
closeLogInButton.addEventListener("click", () => {
    logInPopup.style.display = "none";
    console.log("Log In Dialog closed");
});

//Event listener
dropdown.addEventListener("mouseover", ()=>{
    document.querySelector(".dropdown-content").style.pointerEvents="all";
});

dropdown.addEventListener("mouseout", ()=>{
    document.querySelector(".dropdown-content").style.pointerEvents="none";
});




 
    function signOut() {
        
        const url = new URL(window.location.href);
        url.searchParams.delete('username'); 
        document.getElementById("user").textContent = "Guest";
        
        window.location.href = url.toString();
    }


       var usernameFromPHP = "<?php echo $username; ?>";
    document.getElementById("user").textContent =  usernameFromPHP ;

    function updateUser() {
        const urlParams = new URLSearchParams(window.location.search);
        const username = urlParams.get('username') || "";
    
        document.getElementById("user").textContent = username;
    
        if (username) {
            document.getElementById("pictures-grid").style.display = "grid";
            document.getElementById("signOut").style.display="block";
             document.getElementById("uploadFile").style.display="flex";
            document.querySelector(".upstuf").style.display="flex";
           
        } else {
            document.getElementById("pictures-grid").style.display = "none"; 
            document.getElementById("signOut").style.display="none";
            document.querySelector(".upstuf").style.display="none";
            document.getElementById("uploadFile").style.display="none";
        }
    }
    
  
    updateUser();
    
    
    const observer = new MutationObserver(updateUser);
