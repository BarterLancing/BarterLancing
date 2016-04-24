
function checkfirstname()
{
str=document.getElementById("firstname").value;
pos=str.search(/[A-Z]\w+$/);
if (pos!=0)
	{document.getElementById("spanfirstname").innerHTML="Valid Format Example Zakir";
	document.getElementById("firstname").value="";}
else
	{document.getElementById("spanfirstname").innerHTML="";}
}

function checklastname()
{
str=document.getElementById("lastname").value;
pos=str.search(/[A-Z]\w+$/);
if (pos!=0)
	{document.getElementById("spanlastname").innerHTML="Valid Format Example Khan";
	document.getElementById("lastname").value="";}
else
	{document.getElementById("spanlastname").innerHTML="";}
}

function checkusername()
{
str=document.getElementById("username").value;
pos=str.search(/^\w+$/);
if (pos!=0)
	{document.getElementById("spanusername").innerHTML="Valid Format Example khan001";
	document.getElementById("username").value="";}
else
	{document.getElementById("spanusername").innerHTML="";}
}

function checkpassword()
{
str=document.getElementById("password").value;
pos=str.search(/^[a-z]+\d+$/);
if (pos!=0)
	{document.getElementById("spanpassword").innerHTML="Password must end with a digit";
	document.getElementById("password").value="";}
else
	{document.getElementById("spanpassword").innerHTML="";}
}

function confirmpassword()
{
var1=document.getElementById("password").value;
var2=document.getElementById("confirmpassword").value;
if (var1!=var2)
	{document.getElementById("spanconfirmpassword").innerHTML="Passwords don't match";
	document.getElementById("password").value="";
	document.getElementById("confirmpassword").value="";}
else
	{document.getElementById("spanconfirmpassword").innerHTML="";}
}



function checkskill1()
{
str=document.getElementById("skill1").value;
pos=str.search(/[A-Z]\w+$/);
if (pos!=0)
	{document.getElementById("spanskill1").innerHTML="Valid Format Example Programming";
	document.getElementById("skill1").value="";}
else
	{document.getElementById("spanskill1").innerHTML="";}
}

function checkskill2()
{
str=document.getElementById("skill2").value;
pos=str.search(/[A-Z]\w+$/);
if (pos!=0)
	{document.getElementById("spanskill2").innerHTML="Valid Format Example Programming";
	document.getElementById("skill2").value="";}
else
	{document.getElementById("spanskill2").innerHTML="";}
}

function checkskill3()
{
str=document.getElementById("skill3").value;
pos=str.search(/[A-Z]\w+$/);
if (pos!=0)
	{document.getElementById("spanskill3").innerHTML="Valid Format Example Programming";
	document.getElementById("skill3").value="";}
else
	{document.getElementById("spanskill3").innerHTML="";}
}

function checkworktitle()
{
str=document.getElementById("worktitle").value;
pos=str.search(/[A-Z]\w+$/);
if (pos!=0)
	{document.getElementById("spanworktitle").innerHTML="Valid Format Example Programmer";
	document.getElementById("worktitle").value="";}
else
	{document.getElementById("spanworktitle").innerHTML="";}
}

function checklocation()
{
str=document.getElementById("location").value;
pos=str.search(/[A-Z]\w+$/);
if (pos!=0)
	{document.getElementById("spanlocation").innerHTML="Valid Format Example Pakistan, UK";
	document.getElementById("location").value="";}
else
	{document.getElementById("spanlocation").innerHTML="";}
}



function checkemail()
{
str=document.getElementById("email").value;
pos=str.search(/\S+@\S+\.\S+/);
if (pos!=0)
	{document.getElementById("spanemail").innerHTML="Valid Format Example zakir2013@namal.edu.pk";
	document.getElementById("email").value="";}
else
	{document.getElementById("spanemail").innerHTML="";}
}
