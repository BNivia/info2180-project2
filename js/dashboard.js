//JavaScript for BugMe Issue Tracker

document.addEventListener('DOMContentLoaded', function(){
    //Get the elements at which I will need to insert the data from the database
    allBtn = document.getElementById('all');
    openBtn = document.getElementById('open');
    ticketBtn = document.getElementById('myTicket');

    allBtn.addEventListener("click",function()
    {
        getRecords("query=all")
    });
    openBtn.addEventListener("click",function()
    {
        getRecords("query=open")
    });
    ticketBtn.addEventListener("click",function()
    {
        getRecords("query=my")
    });
    
    });

function getRecords(search)
{
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
    
    console.log(search);
    httpR.open('POST', './php/dashboard.php', true);
    httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpR.send(search);
}

function updateFields(text)
{
    /**type = document.getElementById('type');
    lname = document.getElementById('status');
    pwrd = document.getElementById('assigned');
    email = document.getElementById('created');**/
    console.log("text is ",text);
    var issue = document.getElementById("issue");
    issue.innerHTML = text;

}