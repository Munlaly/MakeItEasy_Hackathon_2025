 const counter = document.getElementById("counter");
const storageKey = "time";
localStorage.removeItem(storageKey); 

let timerValue = parseInt(localStorage.getItem(storageKey)) || 0;
if (timerValue === 0) { 
    timerValue = 604800;
    localStorage.setItem(storageKey, timerValue);
}

let interval = null;

function timer() {
    if (timerValue <= 0) {
        counter.textContent = "Content Removed";
        clearInterval(interval);  
        localStorage.removeItem(storageKey); 
    } else {
        timerValue--;  // Decrement the time
        localStorage.setItem(storageKey, timerValue); 
        setTime();  
    }
}

function setTime() {
    
    let days = Math.floor(timerValue / 86400);  
    let hours = Math.floor((timerValue % 86400) / 3600);  
    let minutes = Math.floor((timerValue % 3600) / 60);  

    
    counter.textContent = 
        String(days).padStart(2, '0') + ":" + 
        String(hours).padStart(2, '0') + ":" + 
        String(minutes).padStart(2, '0');
}


setTime();


if (!interval) {
    interval = setInterval(timer, 1000);  
}