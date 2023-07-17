
// Start Loader
  $(document).ready(function() {
    // hide the loader when the page is ready
    $(".loader").hide();
    heightParallaxHeaderResponsive();
  });

  $(window).ready(function() {
    heightParallaxHeaderResponsive();
  });


  // Initialize Swiper
  mySwiper();
function mySwiper(checkAuto = false){
  var autoplayVar;
  if(checkAuto == true){
    autoplayVar = {
      delay: 4000,
      disableOnInteraction: false
    }
  }
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 0,
    loop: true,
    autoplay:autoplayVar,
    // mousewheel: {
    //   invert: false,
    // },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {                       //navigation(arrows)
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1,
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 1,
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 1,
      },
      // when window width is >= 800px
      800: {
        slidesPerView: 2,
        spaceBetween: 5,
      },
      // when window width is >= 1000px
      1000: {
        slidesPerView: 3,
      },
      // when window width is >= 1100px
      1100: {
        slidesPerView: 4,
      }
    },
  
  });
}


var x=0;
  window.addEventListener('scroll', function() {
    var section = document.querySelector('.mySwiper');
    var sectionTop = section.offsetTop-250;
    var scrollPosition = window.scrollY || window.pageYOffset;
    if(x==0){
      if (scrollPosition >= sectionTop) {
        mySwiper(true)
        x++;
      }
    }
  });



var swiper = new Swiper(".mySwiper2", {
  slidesPerView: "auto",
  spaceBetween: 10,
  loop:true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {                       //navigation(arrows)
    nextEl: "#slider_sky_ad .footer",
    prevEl: ".swiper-button-prev",
  }
});

var swiper = new Swiper(".swiper_about", {
  slidesPerView: 1,
  loop: true,
  // autoplay: {
  //   delay: 2000,
  //   disableOnInteraction: false
  // },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1,
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 1,
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 1,
    },
    // when window width is >= 1500px
    1500: {
      slidesPerView: 1,
    },
    // when window width is >= 1200px
    2000: {
      slidesPerView: 1,
    }
  },
});



// parallax

// var sun = document.getElementById('sun')
var parallax = document.querySelector('.parallax')

var burjkhalifa = document.getElementById('burjkhalifa')
var building = document.getElementById('building')
var dubaitext = document.getElementById('dubaitext')
var dark_start = document.getElementById('dark-start')

const logo = document.querySelector('.logo')

// window.addEventListener('scroll', ()=>{
//   let value = window.scrollY;
//   dubaitext.style.left=`${value*2}px`
//   burjkhalifa.style.top=`${value*1}px`
//   // sun.style.top=`${value*1}px`
//   // sun.style.top=`-${value*5}px`
//   if(value ==0){
//     if(window.innerWidth < 1600 ){
//       dubaitext.style.left=`-4.5%`
//     }
//     if(window.innerWidth < 800){
//       dubaitext.style.left=`-2.5%`
//     }
//   }
//   heightParallaxHeaderResponsive();
// });


window.addEventListener('resize', ()=>{
  heightParallaxHeaderResponsive();
})

window.addEventListener('change', ()=>{
  heightParallaxHeaderResponsive();
})

function heightParallaxHeaderResponsive(){
  parallax.style.height=`${building.clientHeight}px`
};
heightParallaxHeaderResponsive();



// Start translate D and Text Bg when mousemove
const bg = document.getElementById('D');
const windowWidth = window.innerWidth / 3;
const windowHeight = window.innerHeight / 3 ;
// parallax.addEventListener('mousemove', (e) => {
//   const mouseX = e.clientX / windowWidth;
//   const mouseY = e.clientY / windowHeight;

//   bg.style.transform = `translate3d(-${mouseX}%, -${mouseY}%, 0)`;
//   dubaitext.style.transform = `translate3d(${mouseX}%, ${mouseY}%, 0)`;
// });
// End translate D and Text Bg when mousemove



    //Start animate the cursor on mouse click
    const cursorAnimation = document.querySelector(".cursor");
    const cursors = document.querySelectorAll(".cursor");

    document.addEventListener("click", (e) => {
      let x = e.clientX;
      let y = e.clientY;

      cursorAnimation.style.top = y + "px";
      cursorAnimation.style.left = x + "px";

      cursors.forEach((cursor) => {
        cursor.classList.add("active");

        function removeCursorActive(){
          cursor.classList.remove("active");
        }

        setTimeout(removeCursorActive, 1000);
      });
      
      let cursorClone = cursorAnimation.cloneNode(true);
      document.querySelector("body").appendChild(cursorClone);

      setTimeout(() => {
        cursorClone.remove();
      }, 1000);
    });
    //End animate the cursor on mouse click

    

      
    
    