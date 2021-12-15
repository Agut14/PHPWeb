//Función para hacer peticiíon asíncrona al servidor
function numHabit(str){
    let xhttp = new XMLHttpRequest();
    if(str == ""){
        document.getElementById("habitantes").innerHTML = "";
        return;
    }

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("habitantes").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "getHabitantes.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("q=" + str); 
}


