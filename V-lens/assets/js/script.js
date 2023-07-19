let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar')

menu.onclick = () =>
{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () =>
{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}


const activePage = window.location.pathname;


const navLinks = document.querySelectorAll('.header .navbar a').
forEach(link => {
  if(link.href.includes(`${activePage}`))
  {
    link.classList.add('active');
  }
})

function myFunction(e) {
  var x = e.clientX;
  var y = e.clientY;
  document.getElementById("tooltip").style.left = x + "px";
document.getElementById("tooltip").style.top = y + "px";
}

var fullImgBox = document.getElementById("fullImgBox");
var fullImg = document.getElementById("fullImg");

function openFullImg(pic)
{
  fullImgBox.style.display = "flex"; 
  fullImg.src = pic;
}

function closeFullImg()
{
  fullImgBox.style.display = "none";  
}
