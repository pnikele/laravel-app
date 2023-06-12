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

    var elements = document.getElementsByClassName("sidenav_item");
    console.log(elements)


    if(ele !== null){
        if(localStorage.getItem('buttonDisabled')===null)
        {
            for(var i = 0; i < elements.length; i++) {
                elements[i].style.display = "flex";
            }
        console.log('tuks');
        ele.classList.add('placesidenav')
        $("#placesidenav").load(window.location.href + " #placesidenav" );

        } else {
        console.log('navtuks');
        var isButtonDisabled = localStorage.getItem('buttonDisabled') === 'true';
            if (isButtonDisabled) {
                console.log('true');
                for(var i = 0; i < elements.length; i++) {
                    elements[i].style.display = "none";
                }
                ele.classList.remove('placesidenav')
            }else{
                console.log('false');
                ele.classList.add('placesidenav')
                for(var i = 0; i < elements.length; i++) {
                    elements[i].style.display = "flex";
                }
            }
        }
    }
  });

  function openNav() {

    var nav = document.getElementById("sidenav");
    var navbtn = document.getElementById("button-nav-menu");
    var elements = document.getElementsByClassName("sidenav_item");



    // console.log(navitems)

    let ele = document.getElementById('placesidenav');
    console.log(ele)
    // console.log(navitems)

    if(ele.classList.contains('placesidenav')){
        localStorage.setItem('buttonDisabled', 'true');
        console.log(localStorage.getItem('buttonDisabled'));
        ele.classList.remove('placesidenav')
        for(var i = 0; i < elements.length; i++) {
            elements[i].style.display = "none";
        }
        // location.reload()

    }else{
        ele.classList.add('placesidenav')
        for(var i = 0; i < elements.length; i++) {
            elements[i].style.display = "flex";
        }
        localStorage.setItem('buttonDisabled', 'false');
        console.log(localStorage.getItem('buttonDisabled'));
        // location.reload()

    }
    
  }



  

