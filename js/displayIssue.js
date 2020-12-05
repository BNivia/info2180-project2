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

    var url = "../php/displayIssue.php" + window.location.search;
    console.log(url);
    httpR.requestType = "json"
    httpR.open('GET', url);
    httpR.send();
    
    });

function updateFields(text)
{
    /**type = document.getElementById('type');
    lname = document.getElementById('status');
    pwrd = document.getElementById('assigned');
    email = document.getElementById('created');**/
    
    //Get the elements at which I will need to insert the data from the database
    var issue = document.getElementById("main");
    issue.innerHTML = text;

}