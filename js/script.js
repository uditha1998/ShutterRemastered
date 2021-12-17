const nav = document.getElementById("nav");
document.addEventListener('scroll', function () {
    console.log(window.scrollY)
    if (window.scrollY > 0) {
        nav.classList.add('nav_fixed');
    } else {
        nav.classList.remove('nav_fixed');
    }
});



const carousel_images = [ "./image/slider/slider2.jpg",  "./image/slider/slider6.jpg" ];

const image = document.getElementById('image');

var index = 0;
function change_carousel_image() {
    if (index === 1) {
        image.setAttribute('src', carousel_images[index]);
        index = 0;
    } else {
        image.setAttribute('src', carousel_images[index]);
        index = index + 1;
    }
}

setInterval(() => {
    change_carousel_image();
}, 3000)


const menuButton = document.getElementById('menu');
const nav_ul = document.getElementById('nav_ul');
var click = 0;

function menuChange(){
    if(click % 2 == 0){
        openMenu();
        click = click + 1 ;

    }else{
        cloceMenu();
        click = click + 1 ;
    }
} 

function openMenu(){
        nav_ul.style.visibility = 'visible';
        menuButton.setAttribute('src', "./icon/close.png");
}
function cloceMenu(){
    nav_ul.style.visibility = 'hidden';
  menuButton.setAttribute('src', "./icon/menu.png");
}

       




const img = ["./image/photogrphers/man1.jpg", "./image/photogrphers/man2.jpg", "./image/photogrphers/man3.jpg", "./image/photogrphers/man4.jpg"];
const name = ["Hirusha Ravishan", "Namal Dhanushaka", "Asanka Sanjeewa", "Isiwara Uditha"];
const dis = ["Lorem ipsum dolor sit amet consectetur adipisicing elit.Soluta dignissimos repudiandae laudantium delectus ...",
             "Lorem ipsum dolor sit amet consectetur adipisicing elit.Soluta dignissimos repudiandae laudantium delectus ...",
             "Lorem ipsum dolor sit amet consectetur adipisicing elit.Soluta dignissimos repudiandae laudantium delectus ...",
             "Lorem ipsum dolor sit amet consectetur adipisicing elit.Soluta dignissimos repudiandae laudantium delectus ..."];


const image1 = document.getElementById('image1');
const image2 = document.getElementById('image2');
const image3 = document.getElementById('image3');
const name1 = document.getElementById('photographers_name1');
const name2 = document.getElementById('photographers_name2');
const name3 = document.getElementById('photographers_name3');
const dis1 = document.getElementById('photographers_dis1');
const dis2 = document.getElementById('photographers_dis2');
const dis3 = document.getElementById('photographers_dis3');

var index1 = 0;                
var index2 = 1;
var index3 = 2;

function change_image() {
    if (index3 === img.length) {
        index3 = 0;
        image3.setAttribute('src', img[index3]);
        name3.textContent = name[index3];
        dis3.textContent = dis[index3];
    }if (index2 === img.length) {
        index2 = 0;
        image2.setAttribute('src', img[index2]);
        name2.textContent = name[index2];
        dis2.textContent = dis[index2];
    }if (index1 === img.length) {
        index1 = 0;
        image1.setAttribute('src', img[index1]);
    }if ( index1!=img.length || index2!=images.length || index3!=images.length) {
        image1.setAttribute('src', img[index1]);
        name1.textContent = name[index1];
        dis1.textContent = dis[index1];

        image2.setAttribute('src', img[index2]);
        name2.textContent = name[index2];
        dis2.textContent = dis[index2];

        image3.setAttribute('src', img[index3]);
        name3.textContent = name[index3];
        dis3.textContent = dis[index3];
        index1 = index1 + 1;
        index2 = index2 + 1;
        index3 = index3 + 1;
    }   
}

setInterval(() => {
    change_image();
}, 5000);





const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');

const container_sign_up = document.getElementById('signUpForm');
const container_sign_in = document.getElementById('signInForm');

signUpButton.addEventListener('click', () => {
    container_sign_up.style.visibility = 'visible';
    container_sign_in.style.visibility = 'hidden';

    signUpButton.classList.remove("btn_sign_up_change");
    signInButton.classList.remove("btn_sign_in_change");
    signUpButton.classList.add("btn_sign_up_change_click");
    signInButton.classList.add("btn_sign_in_change_click");
});

signInButton.addEventListener('click', () => {
    container_sign_in.style.visibility = 'visible';
    container_sign_up.style.visibility = 'hidden';

    signUpButton.classList.remove("btn_sign_up_change_click");
    signInButton.classList.remove("btn_sign_in_change_click");
    signUpButton.classList.add("btn_sign_up_change");
    signInButton.classList.add("btn_sign_in_change");
});