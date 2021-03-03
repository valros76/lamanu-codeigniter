window.addEventListener("DOMContentLoaded", (e) => {
   var menu_wrapper = document.querySelector('#main-menu-wrapper')
   var menu = document.querySelector('.main-menu')
   let resizeWindow = (e) => {
      e.preventDefault()
      if (window.innerWidth > 960) {
         menu.style.display = 'grid'
      } else if(window.innerWidth <= 960 && !menu_wrapper.classList.contains('active')){
         // menu_wrapper.textContent = `▼`;
         // menu_wrapper.classList.remove('active')
         menu.style.display = 'none'
      }
   }
   window.onresize = resizeWindow;
   window.addEventListener('scroll', (e)=>{
      e.preventDefault()
      document.body.style.setProperty('--scroll',window.pageYOffset / (document.body.offsetHeight - window.innerHeight));
      if(document.querySelector('.main-nav').offsetTop > 58){
         document.querySelector('.main-nav').style.boxShadow = '0 0 3px 1.5px black';
      }else{
         document.querySelector('.main-nav').style.boxShadow = 'none';
      }
   })
   if (menu_wrapper) {
      menu_wrapper.addEventListener('click', (e) => {
         e.preventDefault()
         if (menu_wrapper.classList.contains('active')) {
            menu_wrapper.textContent = `▼`;
            menu_wrapper.classList.remove('active')
            menu.style.display = 'none'
         } else {
            menu_wrapper.classList.add('active')
            menu_wrapper.textContent = `▲`;
            menu.style.display = 'grid'
         }
      })
   }
})