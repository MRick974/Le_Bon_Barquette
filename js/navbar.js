window.onscroll = () =>{
    if(document.documentElement.scrollTop >= 200){
        document.querySelector('.navbar').classList.add('bg-white');
        document.querySelector('#navbar-logo').setAttribute('width','50');
    }else{
        document.querySelector('.navbar').classList.remove('bg-white');
        document.querySelector('#navbar-logo').setAttribute('width','100');
    }
}