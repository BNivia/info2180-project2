//JavaScript for BugMe Issue Tracker

document.addEventListener('DOMContentLoaded', function(){
    var fname = document.getElementById('fName');
    var lname = document.getElementById('lName');
    var pwrd = document.getElementById('passwrd');
    var email = document.getElementById('email');
    var btn = document.getElementById('bttn');
    var mssg= document.getElementById('form-error');
    var n_regex = /^[A-Za-z.\s-]+$/;
    var pwrd_regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    var e_regex = /.{1,}@[^.]{1,}/;
    var count = 0;

    btn.addEventListener('click', function(e){
        e.preventDefault();
        httpR = new XMLHttpRequest();

        //fname validation
        if(fname.value === "" || fname.value === null){
            fname.classList.add("error");
            mssg.innerHTML= "First name field is empty.";
        } else if (fname.value !== "" || fname.value !== null){
            if (fname.value.match(n_regex)){
                fname.classList.add("no-error");
                count++;
            }else{
                fname.classList.add("error");
                mssg.innerHTML= "First name is invalid.";
            }
        }

        //lname validation
        if(lname.value === "" || lname.value === null){
            lname.classList.add("error");
            mssg.innerHTML= "Last name field is empty.";
        } else if (lname.value !== "" || lname.value !== null){
            if (lname.value.match(n_regex)){
                lname.classList.add("no-error");
                count++;
            }else{
                lname.classList.add("error");
                mssg.innerHTML= "Last name is invalid.";
            }
        }

        //pwrd validation
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

        //email validation
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

        if (count == 4){
            httpR.onreadystatechange = function(){
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                    var r = httpR.responseText;
                    alert("New user added.");
                }
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404){
                    alert('ERROR - File not found.');
                }
            }
            let data = 'fname='+fname.value+'&lname='+lname.value+'&pwrd='+pwrd.value+'&email='+email.value;
            httpR.open('POST', '../php/adduser.php', true);
            httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpR.send(data);
        }
        else
        {
            
        }
    });
});

