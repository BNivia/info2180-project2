document.addEventListener('DOMContentLoaded', function(e){
    var title = document.getElementById('title');
    var description = document.getElementById('desc');
    var assign = document.getElementById('select');
    var type = document.getElementById('type').value;
    var priority = document.getElementById('priority').value;
    var mssg = document.getElementById('form-error');
    let btn = document.getElementById('newissue-btn');
    let rgex = /^[A-Za-z.\s-]+$/;
    let count = 0;

    httpR = new XMLHttpRequest();
    httpR.onreadystatechange = function(){
        if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
            var r = httpR.responseText;
            assign.innerHTML = r;
        }
        if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404){
            alert('ERROR - File not found.');
        }
    }

    assign.innerHTML = httpR.open('GET', '../php/newissue.php?action=getnames', true);
    httpR.send();

    btn.addEventListener('click', function(e){
        e.preventDefault();
        var assign = document.getElementById('select');
        console.log("new value");
        console.log(assign);
        //title validation
        if(title.value === null || title.value === ""){
            title.clssList.add("error");
        }else if (title.value !== null || title.value !== ""){
            if (title.value.match(rgex)){
                title.classList.add("no-error");
                count++;
            }else{
                title.classList.add("error")
            }
        }

        //description validation
        if(description.value === null || description.value === ""){
            description.clssList.add("error");
        }else if (description.value !== null || description.value !== ""){
            if (description.value.match(rgex)){
                description.classList.add("no-error");
                count++;
            }else{
                description.classList.add("error")
            }
        }

        if (count == 2){
            httpR.onreadystatechange = function(){
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                    var r = httpR.responseText;
                    mssg.innerHTML = r;
                }
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404){
                    alert('ERROR - File not found.');
                }
            }
            httpR.open('GET', '../php/newissue.php?action=submit&title='+title.value+'&description='+description.value+'&assign='+assign.value+'&priority='+priority+'&type='+type, true);
            httpR.send();
        }
    });
});