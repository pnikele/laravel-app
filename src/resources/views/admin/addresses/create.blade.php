<x-layout>
<main style="flex:5; height:100%">
    <div>
        <div class="popup-content">
            <h1 id="popup" >Adreses pievienošana</h1>
            <div style="padding: 30px 0px">
                <form action="/admin/addresses" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label style="padding-left:14%;font-size:small;" for="country">Valsts</label>
                        <x-form.input id="country" name="country" class="form-control" maxlength="60" value="Latvija" readonly="true"  />
                    </div>

                    <x-form.field>
                    <select class="form-group row" id="county_or_city" name="county_or_city"  class="form-control" style="width:70%;font-size:large ">
                        <option value="">Novads vai valstspilsēta</option>
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
                            <label style="padding-left:14%;font-size:small;" for="address">Adrese</label>
                            <x-form.input id="address" name="address"   class="form-control" maxlength="255"  autocomplete="username"  autofocus />
                    </div>
                    <x-form.field>
                        <select class="form-group row" id="users" name="user_id"class="form-control" style="width:70%;font-size:large ">
                            <option value="">Īpašnieks</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">id[{{ $user->id }}] {{ $user->name }} {{ $user->surname}}</option>
                            @endforeach
                        </select>
                            @error("county_or_city")
                                <p style="color:red; font-size:x-small; margin-bottom:-10px; margin-top:5px">{{ $message }}</p>
                            @enderror
                        </x-form.field>
                    </div>
                    <div class="popup_footer_btns">
                        <button id="default_button" type="submit">
                            Pievienot
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</x-layout>