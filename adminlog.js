function validate(){
    var username=document.getElementById("name").value;
    var password=document.getElementById("password").value;
    if(username=="admin"&&password=="admin123"){
        window.location.replace("admin.php");
    }
    else{
        alert("incorrect password")
    }
}