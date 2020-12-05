//JavaScript for BugMe Issue Tracker

document.addEventListener('DOMContentLoaded', function(){
    //Get the elements at which I will need to insert the data from the database
    allBtn = document.getElementById('all');
    openBtn = document.getElementById('open');
    ticketBtn = document.getElementById('myTicket');
    create = document.getElementById('create');

    getRecords("query=all");
    allBtn.addEventListener("click",function() 
    {
        getRecords("query=all")
        allBtn.classList.add("selected");
        openBtn.classList.remove("selected");
        ticketBtn.classList.remove("selected");
    });
    openBtn.addEventListener("click",function()
    {
        getRecords("query=open")
        openBtn.classList.add("selected");
        ticketBtn.classList.remove("selected");
        allBtn.classList.remove("selected");
    });
    ticketBtn.addEventListener("click",function()
    {
        getRecords("query=my")
        ticketBtn.classList.add("selected");
        allBtn.classList.remove("selected");
        openBtn.classList.remove("selected");
    });

    create.addEventListener("click", function(){
        window.location.assign("../html/NewIssuehtml.php");
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
    httpR.open('POST', '../php/dashboard.php', true);
    httpR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    httpR.send(search);
}

function updateFields(text)
{
    var issue = document.getElementById("issue");
    issue.innerHTML = text;
}