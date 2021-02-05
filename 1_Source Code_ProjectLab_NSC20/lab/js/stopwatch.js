var counter = document.getElementById("counter");
var hourCount = document.getElementById("hours");
var minCount = document.getElementById("mins");
var secCount = document.getElementById("secs");

var startButton = document.getElementById("start");
var pauseButton = document.getElementById("pause");
var stopButton = document.getElementById("stop");
var setButton = document.getElementById("newTimeButton");
var newTime = document.getElementById("newTime");
var timeInputForm = document.getElementById("timeInputForm");


var start = true,
    stop = false,
    pause = false;

startButton.onclick = function() {
    start = true;
    stop = pause = false;
    this.className = "controlPress";
    stopButton.className = "controlRelease";
    pauseButton.className = "controlRelease";
};

stopButton.onclick = function() {
    stop = true;
    start = false;
    this.className = "controlPress";
    startButton.className = "controlRelease";
    pauseButton.className = "controlRelease";
};

pauseButton.onclick = function() {
    pause = true;
    start = false;
    this.className = "controlPress";
    startButton.className = "controlRelease";
    stopButton.className = "controlRelease";
};

setButton.onclick = function() {
    if (newTime.value) {
        stop = false;
        counter.innerHTML = newTime.value;
        newTime.value = null;
    }
};

setInterval(function() {
    var hours = 0,
        mins = 0,
        secs = 0;
    var count = 0;

    if (start) {
        count = counter.innerHTML;
        count = counter.innerHTML = parseInt(count, 10) + 1;
    }
    else if (stop) {
        count = counter.innerHTML = 0;
    }
    else if (pause) {
        return;
    }


    hours = count / 3600;
    mins = (count / 60) % 60;
    secs = count % 60;

    hourCount.innerHTML = parseInt(hours, 10);
    minCount.innerHTML = parseInt(mins, 10);
    secCount.innerHTML = parseInt(secs, 10);

}, 1000);