document.addEventListener("DOMContentLoaded", function () {
    var email = document.getElementById('email');
    var pwrd = document.getElementById('pwrd');
    var btn = document.getElementById('login-btn');
    var mssg = document.getElementById('error');
    var pwrd_regex = /^[0-9a-zA-Z]{8,}$/
    var e_regex = /.{1,}@[^.]{1,}/;
    var count = 0;

    btn.addEventListener('click', function (e){
        e.preventDefault();
        httpR = new XMLHttpRequest();

        //email validatiion
        if(email.value === "" || email.value === null){
            email.classList.add("error");
            mssg.innerHTML= "Email field is empty.";
        } else if (email.value !== "" || email.value !== null){
            if (email.value.match(e_regex)){
                email.classList.add("no-error");
                count++;
            }else{
                email.classList.add("error");
                mssg.innerHTML= "Email is invalid.";
            }
        }

        //password validation
        if(pwrd.value === "" || pwrd.value === null){
            pwrd.classList.add("error");
            mssg.innerHTML= "Password field is empty.";
        } else if (pwrd.value !== "" || pwrd.value !== null){
            if (pwrd.value.match(pwrd_regex)){
                pwrd.classList.add("no-error");
                count++;
            }else{
                pwrd.classList.add("error");
                mssg.innerHTML= "Password is invalid.";
            }
        }

        if (count == 2){
            httpR.onreadystatechange = function(){
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                    var r = httpR.responseText;
                    console.log(r);
                    if(r.trim() == "Login successful."){
                        location.assign("./html/dashhtml.php");
                    }
                }
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404){
                    alert('ERROR - File not found.');
                }
            }
            let data = 'pwrd='+pwrd.value+'&email='+email.value;
            httpR.open('POST', './php/login.php', true);
            httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpR.send(data);
        }
    });
});