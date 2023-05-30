document.addEventListener("DOMContentLoaded", function(event) { 
    const resize_ob = new ResizeObserver(function(entries) {
        // since we are observing only a single element, so we access the first element in entries array
        let rect = entries[0].contentRect;
        divElement = document.querySelector("nav");
        elemHeight = divElement.offsetHeight;
        document.querySelector("body").style.paddingTop = elemHeight + "px";
        // current width & height
        //let height = rect.height;
        // console.log('Current Height : ' + height,elemHeight);
    });
    resize_ob.observe(document.querySelector("nav"));
  });


  

