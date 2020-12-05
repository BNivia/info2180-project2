//JavaScript for BugMe Issue Tracker

var id = window.location.search.slice(1);

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

    httpR.open('POST', '../php/displayIssue.php', true);
    httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpR.send(id);

});

function updateRecord(search)
{
    httpR = new XMLHttpRequest();
    searchVal = id +"&" + search;
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
    
    console.log(searchVal);
    httpR.open('POST', '../php/displayIssue.php', true);
    httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpR.send(searchVal);
}


function updateFields(text)
{
    /**type = document.getElementById('type');
    lname = document.getElementById('status');
    pwrd = document.getElementById('assigned');
    email = document.getElementById('created');**/
    
    //Get the elements at which I will need to insert the data from the database
    var issue = document.getElementById("main");
    issue.innerHTML = text;
    
    closedBtn = document.getElementById("closed");
    console.log(closedBtn);
    progressBtn = document.getElementById("progress");

    closedBtn.addEventListener("click",function() 
    {
        
        updateRecord("mark=closed");
        //window.location.reload();
    
    });

    progressBtn.addEventListener("click",function() 
    {
        updateRecord("mark=progress");
        //window.location.reload();
    });
}