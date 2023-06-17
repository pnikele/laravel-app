<x-layout>
    <main style="flex:5; height:100%">
        <div>
        <div class="popup-content">
            <h1 id="popup" >Skaitītāja instalācijas labošana</h1>
            <div style="padding: 30px 0px">
    
                <form method="POST"  action="/admin/reader_installations/{{$readers_installation->id}}">
                    @csrf
                    @method('PATCH')
                    <label class="form" style="padding-left:14%;font-size:small;" for="reader_id"> Skaitītājs</label>
                    <x-form.field>
                        <select class="form-group row" id="reader_id" name="reader_id"class="form-control" style="width:70%;font-size:large ">
                            <option value="{{ $readers_installation->reader_id }}">id[{{$readers_installation->reader_id}}] {{ $readers_installation_data->identifier }}</option>
                            @foreach ($readers as $reader)
                            <option value="{{ $reader->id }}">id[{{$reader->id}}] {{ $reader->identifier }}</option>
                            @endforeach
                        </select>
                            @error("reader_id")
                                <p style="color:red; font-size:x-small; margin-bottom:-10px; margin-top:5px">{{ $message }}</p>
                            @enderror
                    </x-form.field>

                    <label class="form" style="padding-left:14%;font-size:small;" for="address_id">Adrese</label>
                    <x-form.field>
                        <select class="form-group row" id="address_id" name="address_id"class="form-control" style="width:70%;font-size:large ">
                            <option value="{{ $readers_installation->address_id }}">id[{{$readers_installation->address_id}}] {{ $readers_installation_data->address }}</option>
                            @foreach ($addresses as $address)
                            <option value="{{ $address->id }}">id[{{$address->id}}] {{ $address->county_or_city }}, {{ $address->address }}</option>
                            @endforeach
                        </select>
                            @error("address_id")
                                <p style="color:red; font-size:x-small; margin-bottom:-10px; margin-top:5px">{{ $message }}</p>
                            @enderror
                    </x-form.field>

                    <div class="form-group row">
                        <label class="form" style="padding-left:14%;font-size:small;" for="installation_date">Instalācijas datums</label>
                        <x-form.input id="installation_date" type="date" name="installation_date" value="{{ $readers_installation->installation_date }}"   class="form-control" autocomplete="installation_date"  autofocus />
                    </div>

                    <div class="form-group row">
                        <label class="form" style="padding-left:14%;font-size:small;" for="expiration_date">Nākamās apkopes datums</label>
                        <x-form.input id="expiration_date" type="date" name="expiration_date" value="{{ $readers_installation->expiration_date }}"    class="form-control" autocomplete="expiration_date"  autofocus />
                    </div>
                <div class="form_footer_btns">
                    <a href="/admin/reader_installations/{{$readers_installation->id}}"  style="text-decoration:none;font-weight:normal;" id="default_button_form">Atcelt</a>
                    <button id="default_button_form" type="submit">
                        Labot
                    </button>
                </div>
            </form>
        </div>
        </div>
    </main>
    </x-layout>