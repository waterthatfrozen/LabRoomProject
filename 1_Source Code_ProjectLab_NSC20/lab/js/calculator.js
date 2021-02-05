function MW() {
		var MW = document.getElementById("MW");
	var value = MW.options[MW.selectedIndex].value;
	document.getElementById("gmol").innerHTML = "ปริมาณสารต่อโมล " + value + " กรัม/โมล";
	if(isFinite((parseFloat(document.getElementById("MW").options[MW.selectedIndex].value) / parseFloat(document.getElementById("weight").value)) / parseFloat((document.getElementById("water").value)/1000))){
		
		var num = (parseFloat(document.getElementById("MW").options[MW.selectedIndex].value) / parseFloat(document.getElementById("weight").value)) / parseFloat((document.getElementById("water").value)/1000);
		
	document.getElementById("display").innerHTML = num.toFixed(2) + " โมลต่อลิตร";
	
	}
}
function weight(){
		var MW = document.getElementById("MW");
	var value = MW.options[MW.selectedIndex].value;
	document.getElementById("gmol").innerHTML = "ปริมาณสารต่อโมล " + value + " กรัม/โมล";
	if(isFinite((parseFloat(document.getElementById("MW").options[MW.selectedIndex].value) / parseFloat(document.getElementById("weight").value)) / parseFloat((document.getElementById("water").value)/1000))){
		
		var num = (parseFloat(document.getElementById("MW").options[MW.selectedIndex].value) / parseFloat(document.getElementById("weight").value)) / parseFloat((document.getElementById("water").value)/1000);
		
	document.getElementById("display").innerHTML = num.toFixed(2) + " โมลต่อลิตร";
	
	}
}
function water(){
		var MW = document.getElementById("MW");
	var value = MW.options[MW.selectedIndex].value;
	document.getElementById("gmol").innerHTML = "ปริมาณสารต่อโมล " + value + " กรัม/โมล";
	if(isFinite((parseFloat(document.getElementById("MW").options[MW.selectedIndex].value) / parseFloat(document.getElementById("weight").value)) / parseFloat((document.getElementById("water").value)/1000))){
		
		var num = (parseFloat(document.getElementById("MW").options[MW.selectedIndex].value) / parseFloat(document.getElementById("weight").value)) / parseFloat((document.getElementById("water").value)/1000);
		
	document.getElementById("display").innerHTML = num.toFixed(2) + " โมลต่อลิตร";
	
	}
}