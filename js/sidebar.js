var sidebarBtn = document.querySelector('.sidebar_btn');
var sidebar = document.querySelector('.sidebar');

sidebarBtn.addEventListener('click', () => {
    if(sidebar.classList.contains('toggled')){
        sidebar.classList.remove('toggled')
    }else{
        sidebar.classList.add('toggled')
    }
})