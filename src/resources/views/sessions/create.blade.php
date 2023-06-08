<x-layout>
        <div class="popup-content">
            <h1 id="popup" >Pieslēgties</h1>
            <div style="padding: 30px 0px">
                <form action="/login" method="POST" >
                    @csrf
                    <div class="form-group row">
                            <x-form.input type="email" id="email" name="email"  placeholder="E-pasts" class="form-control"  autocomplete="username"  autofocus />
                    </div>

                    <div  class="form-group row">
                            <x-form.input  name="password" type="password" id="password" class="form-control" placeholder="Parole" autocomplete="current-password"  />
                    </div>
                </div>
            <div class="popup_footer_btns">
                <button id="default_button" type="submit">
                    Pieslēgties
                </button>
                </div>
            </form>
            </footer>
        </div>
</x-layout>

{{-- <script>
    
    myButton.addEventListener("click", function () {
        myPopup.classList.add("show");
    });
    closePopup.addEventListener("click", function () {
        myPopup.classList.remove("show");
    });
    window.addEventListener("click", function (event) {
        if (event.target == myPopup) {
            myPopup.classList.remove("show");
        }
    });



</script> --}}