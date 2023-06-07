document.addEventListener("DOMContentLoaded", function(event) { 
    const resize_ob = new ResizeObserver(function(entries) {
        // since we are observing only a single element, so we access the first element in entries array
        let rect = entries[0].contentRect;
        divElement = document.querySelector("nav");
        elemHeight = divElement.offsetHeight;
        elemHeight = elemHeight -1;
        document.querySelector("body").style.paddingTop = elemHeight + "px";
        // current width & height
        //let height = rect.height;
        // console.log('Current Height : ' + height,elemHeight);
    });
    resize_ob.observe(document.querySelector("nav"));


    let ele = document.getElementById('placesidenav');

    if(ele !== null){
        if(localStorage.getItem('buttonDisabled')===null)
        {
        console.log('tuks');
        ele.classList.add('placesidenav')
        // ele.innerHTML += '<div id="sidenav" style=" flex:1; background-color:#E9FFFF; box-shadow: 1px 0 5px #888;"></div>';
        $("#placesidenav").load(window.location.href + " #placesidenav" );

        } else {
        console.log('navtuks');
        var isButtonDisabled = localStorage.getItem('buttonDisabled') === 'true';
            if (isButtonDisabled) {
                console.log('true');
                ele.classList.remove('placesidenav')
                // nav.style.display = "flex"
                // navbtn.classList.add('open')
            }else{
                console.log('false');
                ele.classList.add('placesidenav')
            }
            $("#placesidenav").load(window.location.href + " #placesidenav" );
        }
    }
  });

  function openNav() {

    var nav = document.getElementById("sidenav");
    var navbtn = document.getElementById("button-nav-menu");
    let ele = document.getElementById('placesidenav');
    console.log(ele)

    if(ele.classList.contains('placesidenav')){
        localStorage.setItem('buttonDisabled', 'true');
        console.log(localStorage.getItem('buttonDisabled'));
        location.reload()

    }else{
        localStorage.setItem('buttonDisabled', 'false');
        console.log(localStorage.getItem('buttonDisabled'));
        location.reload()


    }
  }


  

