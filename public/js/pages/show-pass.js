
function togglePW(){
    var x =document.getElementById("password");
    var y =document.getElementById("font1");
    var z =document.getElementById("font2");

    if(x.type ==='password'){
        x.type = 'text';
        y.style.display = "block";
        z.style.display="none";
    }else{
       x.type = 'password';
        y.style.display = "none";
        z.style.display="block";
    }

}
function rtogglePW(){
    var x =document.getElementById("rpassword");
    var y =document.getElementById("font3");
    var z =document.getElementById("font4");

    if(x.type ==='password'){
        x.type = 'text';
        y.style.display = "block";
        z.style.display="none";
    }else{
       x.type = 'password';
        y.style.display = "none";
        z.style.display="block";
    }

}
function ltogglePW(){
    var password = document.querySelector('[name=password]');

    if(password.getAttribute('type')==='password'){
        password.setAttribute('type', 'text');
        document.getElementById("font").style.color='black';
    }
    else{
        password.setAttribute('type', 'password');
        document.getElementById("font").style.color='black';
    }
}
function atogglePW(){
    var password = document.querySelector('[name=rpassword]');

    if(password.getAttribute('type')==='password'){
        password.setAttribute('type', 'text');
        document.getElementById("font").style.color='black';
    }
    else{
        password.setAttribute('type', 'password');
        document.getElementById("font").style.color='black';
    }
}
function btogglePW(){
    var password = document.querySelector('[name=old_password]');

    if(password.getAttribute('type')==='password'){
        password.setAttribute('type', 'text');
        document.getElementById("font").style.color='black';
    }
    else{
        password.setAttribute('type', 'password');
        document.getElementById("font").style.color='black';
    }
}
