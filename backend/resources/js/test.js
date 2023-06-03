var timeBlock = document.querySelector('#time')
var min = timeBlock.innerHTML;
min--;
var sec = 59;
var resultTime;

var countdownInterval = setInterval(function() {
    // Уменьшаем время на 1 каждые 1000 миллисекунд
    sec--;
    if (min <= 0 && sec <= 0){
        clearInterval(countdownInterval);
        document.querySelector('#form').submit();
    }
    if (sec <= 0){
        sec = 59
        min--;
    }
    resultTime = min+":"+sec

    timeBlock.innerHTML = resultTime;
}, 1000);

