<x-layout>
    <main style="flex:5; height:100%">
        <div>
        <div class="popup-content">
            <h1 id="popup" >Lietotāja pievienošana</h1>
            <div style="padding: 30px 0px">
    
                <form method="POST"  action="/admin/users">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label class="form" style="padding-left:14%;font-size:small;" for="name">Vārds</label>
                        <x-form.input id="name" name="name"   class="form-control" maxlength="255"  autocomplete="name"  autofocus />
                    </div>

                    <div class="form-group row">
                            <label class="form" style="padding-left:14%;font-size:small;" for="surname">Uzvārds</label>
                            <x-form.input id="surname" name="surname"   class="form-control" maxlength="255"  autocomplete="surname"  autofocus />
                    </div>

                    <div class="form-group row">
                        <label class="form" style="padding-left:14%;font-size:small;" for="email">Uzvārds</label>
                        <x-form.input id="email" name="email"    class="form-control" maxlength="255"  autocomplete="email"  autofocus />
                    </div>

                        <div style="display: flex">
                            <div style="padding-left:14%;font-size:small;" >Admins</div>
                            <input type="hidden" value="0" name="is_admin">
                            <input name="is_admin" type="checkbox" value="1" style="border:none;margin-left:10px" >
                        </div>
                <div class="form_footer_btns">
                    <a href="/admin/users"  style="text-decoration:none;font-weight:normal;" id="default_button_form">Atcelt</a>
                    {{-- <button id="default_button_form" type="submit"> --}}
                    <button id="default_button_form" type="button">
                        Pievienot
                    </button>
                </div>
            </form>
        </div>
        </div>
    </main>
    </x-layout>