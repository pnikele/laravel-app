<x-layout>
    <div class="popup-content">
        <h1 id="popup" >Reģistrācija</h1>
        <div style="padding: 30px 0px">
            <form action="/register" method="POST">
                @csrf
                <div class="form-group row">
                    <label style="padding-left:14%;font-size:small;" for="name">Vārds</label>
                    <x-form.input id="name" name="name"   class="form-control" autofocus />
                </div>

                <div class="form-group row">
                    <label style="padding-left:14%;font-size:small;" for="surname">Uzvārds</label>
                    <x-form.input id="surname" name="surname"  class="form-control" autofocus />
                </div>

                <div class="form-group row">
                        <label style="padding-left:14%;font-size:small;" for="email">E-pasts</label>
                        <x-form.input type="email" id="email" name="email"   class="form-control"  autocomplete="username"  autofocus />
                </div>

                <div  class="form-group row">
                         <label style="padding-left:14%;font-size:small;" for="password">Parole</label>
                        <x-form.input  name="password" type="password" id="password" class="form-control" autocomplete="current-password"  />
                </div>

                <div  class="form-group row">
                    <label style="padding-left:14%;font-size:small;" for="password_confirmation">Atkārtota parole</label>
                    <x-form.input  name="password_confirmation" type="password" id="password" class="form-control"  autocomplete="current-password"  />
                </div>
            </div>
            <div class="popup_footer_btns">
            <button id="default_button" type="submit">
                Reģistrēties
            </button>
            </div>
        </form>
        </footer>
    </div>
</x-layout>
