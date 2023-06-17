<x-layout>
    <main style="flex:5; height:100%">
        <div>
        <div class="popup-content">
            <h1 id="popup" >Skaitītāja labošana</h1>
            <div style="padding: 30px 0px">
    
                <form method="POST"  action="/admin/readers/{{$reader->id}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label class="form" style="padding-left:14%;font-size:small;" for="identifier">Identifikators</label>
                        <x-form.input id="identifier" name="identifier" value="{{ $reader->identifier }}"   class="form-control" maxlength="20"  autocomplete="identifier"  autofocus />
                    </div>

                    <div class="form-group row">
                            <label class="form" style="padding-left:14%;font-size:small;" for="manufacturer">Izgatavotājs</label>
                            <x-form.input id="manufacturer" name="manufacturer" value="{{ $reader->manufacturer }}"   class="form-control" maxlength="255"  autocomplete="manufacturer"  autofocus />
                    </div>

                    <div class="form-group row">
                        <label class="form" style="padding-left:14%;font-size:small;" for="email">Izgatavošanas datums</label>
                        <x-form.input id="manufature_date" type="date" name="manufature_date" value="{{ $reader->manufature_date }}"   class="form-control" autocomplete="manufature_date"  autofocus />
                    </div>
                <div class="form_footer_btns">
                    <a href="/admin/readers"  style="text-decoration:none;font-weight:normal;" id="default_button_form">Atcelt</a>
                    <button id="default_button_form" type="submit">
                        Labot
                    </button>
                </div>
            </form>
        </div>
        </div>
    </main>
    </x-layout>