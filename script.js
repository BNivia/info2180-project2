//JavaScript for BugMe Issue Tracker

document.addEventListener('DOMContentLoaded', function(){
    fname = document.getElementById('fName');
    lname = document.getElementById('lName');
    pwrd = document.getElementById('passwrd');
    email = document.getElementById('email');
    btn = document.getElementById('bttn');
    error = document.getElementById('form-error');
    
    n_regex = /^[a-z ,.'-]+$/;
    pwrd_regex = /^[0-9a-zA-Z]+$/
    e_regex = /.{1,}@[^.]{1,}/;
    count = 0;

    btn.addEventListener('click', function(e){
        e.preventDefault();
        httpR = new XMLHttpRequest();

        //fname validation
        if(fname.value === "" || fname.value === null){
            fname.classList.add("error");
        } else if (fname.value !== "" || fname.value !== null){
            if (fname.value.match(n_regex)){
                fname.classList.add("no-error");
                count++;
            }else{
                fname.classList.add("error");
            }
        }else{
            fname.classList.add("no-error");
            count++;
        }

        //lname validation
        if(lname.value === "" || lname.value === null){
            lname.classList.add("error");
        } else if (lname.value !== "" || lname.value !== null){
            if (lname.value.match(n_regex)){
                lname.classList.add("no-error");
                count++;
            }else{
                lname.classList.add("error");
            }
        }else{
            lname.classList.add("no-error");
            count++;
        }

        //pwrd validation
        if(pwrd.value === "" || pwrd.value === null){
            pwrd.classList.add("error");
        } else if (pwrd.value !== "" || pwrd.value !== null){
            if (pwrd.value.match(pwrd_regex)){
                pwrd.classList.add("no-error");
                count++;
            }else{
                pwrd.classList.add("error");
            }
        }else{
            pwrd.classList.add("no-error");
            count++;
        }

        //email validation
        if(email.value === "" || email.value === null){
            email.classList.add("error");
        } else if (email.value !== "" || email.value !== null){
            if (email.value.match(e_regex)){
                email.classList.add("no-error");
                count++;
            }else{
                email.classList.add("error");
            }
        }else{
            email.classList.add("no-error");
            count++;
        }

        if (count == 4){
            httpR.onreadystatechange = function(){
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200){
                    var r = httpR.responseText;
                    document.getElementById("error").innerHTML = r;
                }
                if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404){
                    alert('ERROR - File not found.');
                }
            }
            let data = 'fname='+fname.value+'&lname='+lname.value+'&pwrd='+pwrd.value+'&email='+email.value;
            httpR.open('POST', 'adduser.php', true);
            httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpR.send(data);
        }
    });
});

