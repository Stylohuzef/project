function validate()
{
  var name=document.getElementById("name").value;
  var email=document.getElementById("email").value;
  var message=document.getElementById("message").value;

  if(name=="Mustufa"&& email=="mustufa.n53@gmail.com"&& message=="Yes")
 {
  alert("Your Response has been Recorded");
  return false;
 }
 else
  {
  alert("You have been not Registered");
  }
}
