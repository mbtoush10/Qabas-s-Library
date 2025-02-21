function changeBGC() {
    var color = document.getElementById("BGC").value;

        document.body.style.backgroundColor = color;


}


let seconds = 0;
setInterval(() => { //عداد بحسب كم قعدت بالصفحه 
    seconds++;
    document.getElementById("timeSpent").textContent = seconds;
}, 1000);

function increaseFontSize() {
    content = document.getElementById('bookList');
    currentSize = window.getComputedStyle(content).fontSize;
    newSize = parseFloat(currentSize) + 2;
    content.style.fontSize = newSize + 'px';
}

function decreaseFontSize() {
    content = document.getElementById('bookList');
    currentSize = window.getComputedStyle(content).fontSize;
    newSize = parseFloat(currentSize) - 2;
    content.style.fontSize = newSize + 'px';
}

function updateClock() {
    const now = new Date();
    
    const hours = now.getHours().toString().padStart(2,'0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    
    const day = now.getDate().toString().padStart(2, '0');
    const month = (now.getMonth()+1 ).toString().padStart(2, '0');
    const year = now.getFullYear();

    const formatTime = `${hours}:${minutes}:${seconds}`;
    const formatDate = `${year}/${month}/${day}`;
    
    document.getElementById('timeNow').innerText = `${formatDate} - ${formatTime}`;
}

setInterval(updateClock, 1000);
updateClock();