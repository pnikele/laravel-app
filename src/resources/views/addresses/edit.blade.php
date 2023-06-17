<x-layout>
    <main style="flex:5; height:100%">
        <div>
        <div class="popup-content">
            <h1 id="popup" >Adreses labošana</h1>
            <div style="padding: 30px 0px">
    
                <form method="POST"  action="{{ $address->path() }}">
                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label class="form" style="padding-left:14%;font-size:small;" for="country">Valsts</label>
                        <x-form.input id="country" name="country" class="form-control" maxlength="60" value="Latvija" readonly="true"  />
                    </div>
    
                    <x-form.field>
                    <select class="form-group row" id="county_or_city" name="county_or_city"class="form-control" style="width:70%;font-size:large ">
                        <option value="{{ $address->county_or_city }}">{{ $address->county_or_city }}</option>
                        @foreach ($counties as $county)
                        <option value="{{ $county->county_or_city }}">{{ $county->county_or_city }}</option>
                        @endforeach
                    </select>
                        @error("county_or_city")
                            <p style="color:red; font-size:x-small; margin-bottom:-10px; margin-top:5px">{{ $message }}</p>
                        @enderror
                    </x-form.field>
    
                    {{-- <div class="form-group row">
                        <label style="padding-left:14%;font-size:small;" for="county_or_city">Novads vai valstspilsēta</label>
                        <x-form.input id="county_or_city" name="county_or_city"  class="form-control" autofocus />
                    </div> --}}
    
                    <div class="form-group row">
                            <label class="form" style="padding-left:14%;font-size:small;" for="address">Adrese</label>
                            <x-form.input id="address" name="address" value="{{ $address->address }}"   class="form-control" maxlength="255"  autocomplete="username"  autofocus />
                    </div>
                <div class="form_footer_btns">
                    <a href="/addresses"  style="text-decoration:none;font-weight:normal;" id="default_button_form">Atcelt</a>
                    <button id="default_button_form" type="submit">
                        Labot
                    </button>
                </div>
            </form>
        </div>
        </div>
    </main>
    </x-layout>