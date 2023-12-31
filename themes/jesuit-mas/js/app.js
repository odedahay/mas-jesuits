(function () {

  // mobile nav
  hamburgerMenu = document.querySelector(".site-header--hamburger");
  buttonMenu = document.querySelector('#navbarSideCollapse');

  buttonMenu.addEventListener('click', function () {
    document.querySelector('.offcanvas-collapse').classList.toggle('open')
    hamburgerMenu.classList.toggle('change');
  })

  // Hamburger menu animation

  // hamburgerMenu.addEventListener('click', function(){
  //   x.classList.toggle("change");
  // })


  // Header sticky nav
  const throttle = (func, limit) => {
    let lastFunc;
    let lastRan;
    
    return function() {
      const context = this;
      const args = arguments;
      if (!lastRan) {
        func.apply(context, args)
        lastRan = Date.now();
      } else {
        clearTimeout(lastFunc);
        lastFunc = setTimeout(function() {
            if ((Date.now() - lastRan) >= limit) {
              func.apply(context, args);
              lastRan = Date.now();
            }
        }, limit - (Date.now() - lastRan));
      }
    }
  }

  siteHeader = document.querySelector(".site-header");

    window.addEventListener("scroll", throttle( ()=> runOnScroll(), 200)) ;

    function runOnScroll(){

      if(window.scrollY > 150){
        siteHeader.classList.add('site-header__screen');
      }else{
        siteHeader.classList.remove('site-header__screen');
      }
    }
    
 

  })()