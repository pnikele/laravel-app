<x-layout>
    <main style="flex:5; height:100%">

        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <div class="form-group row">
                    <h2>Skaitītāju isntalāciju dati</h2>
                    <table id="table" style="width: 100%">
                        <thead>
                            <tr>
                                <tr>
                                    <th style="text-align: left">Id</th>
                                    <th style="text-align: left">Skaitītāja_Id</th>
                                    <th style="text-align: left">Identifikators</th>
                                    <th style="text-align: left" >Ražotājs</th>
                                    <th style="text-align: left" >Izgatavošanas datums</th>
                                    <th style="text-align: left" >Uzstādīšanas datums</th>
                                    <th style="text-align: left" >Nākamās apkopes datums</th>
                                    <th style="text-align: left" >Adrese_Id</th>
                                    <th style="text-align: left" >Adrese</th>
                                    <th style="text-align: left" >Lietotāja_Id</th>
                                    <th style="text-align: left" >Īpašnieks</th>
                                    <th style="text-align: left" ></th>
                                </tr>
                            </tr>
                        </thead>
                        <tbody>
                                    <tr onclick="window.location.href= '/admin/reader_installations/{{$readers_installation_data->id}}'">
                                    <td >{{ $readers_installation_data->id}}</td>
                                    <td >{{ $readers_installation_data->reader_id}}</td>
                                    <td >{{ $readers_installation_data->identifier}}</td>
                                    <td >{{ $readers_installation_data->manufacturer}}</td>
                                    <td >{{ $readers_installation_data->manufature_date}}</td>
                                    <td >{{ $readers_installation_data->installation_date}}</td>
                                    <td >{{ $readers_installation_data->expiration_date}}</td>
                                    <td >{{ $readers_installation_data->address_id}}</td>
                                    <td >{{ $readers_installation_data->country}},{{ $readers_installation_data->county_or_city}},{{ $readers_installation_data->address}}</td>
                                    <td >{{ $readers_installation_data->user_id}}</td>
                                    <td >{{ $readers_installation_data->name}},{{ $readers_installation_data->surname}}</td>
                                    <td>
                                        <a style="text-decoration: none;" href="/admin/reader_installations/{{$readers_installation_data->id.'/edit'}}">Labot</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 10px">
                    <h2>Skaitītāja rādījumi</h2>
                    {{-- list of skaititaji --}}
                        <div class="form-group row">
                            <table id="table2" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: left">Skaitītāja_instalācijas_Id</th>
                                        <th style="text-align: left" >Rādījums</th>
                                        <th style="text-align: left" >Nolasījuma datums</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($readings as $reading)
                                        <tr>
                                            <td >{{ $reading->reader_installation_id}}</td>
                                            <td >{{ $reading->reading}}</td>
                                            <td >{{ $reading->reading_datetime}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            @if($readings->count() == 0)
                            <div style="width: 100%;margin-top:5px;">
                                <h2 style="padding-left:5px">Nav nolasījumu.</h2>
                            </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </main>
    </x-layout>