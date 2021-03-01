window.addEventListener("DOMContentLoaded", (e) => {
   var menu_wrapper = document.querySelector('#main-menu-wrapper')
   var menu = document.querySelector('.main-menu')
   let resizeWindow = (e) => {
      e.preventDefault()
      if (window.innerWidth > 760) {
         menu.style.display = 'grid'
      } else {
         menu_wrapper.textContent = `▼`;
         menu_wrapper.classList.remove('active')
         menu.style.display = 'none'
      }
   }
   window.onresize = resizeWindow;
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