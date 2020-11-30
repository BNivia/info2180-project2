//JavaScript for BugMe Issue Tracker

document.addEventListener('DOMContentLoaded', function(){
    
    httpR = new XMLHttpRequest();

    httpR.onreadystatechange = function()
    {
        if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 200)
        {
            updateFields(httpR.responseText);
        }
        if (httpR.readyState === XMLHttpRequest.DONE && httpR.status === 404)
        {
            alert('ERROR - File not found.');
        }
    }

    url = window.location.href;
    httpR.open('POST', 'adduser.php', true);
    httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpR.send(data);
    
    });

updateFields(text)
{
    /**type = document.getElementById('type');
    lname = document.getElementById('status');
    pwrd = document.getElementById('assigned');
    email = document.getElementById('created');**/
    
    //Get the elements at which I will need to insert the data from the database
    var issue = document.getElementById("issue");
    issue.innerHTML = text;

}