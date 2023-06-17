<x-layout>
    <body>
    <main style="flex:5;">
        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <h1 style="color: #558388;">Skaitītāju instalācijas</h1>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Meklēt.." title="Ieraksti frāzi">
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
                            </tr>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($readers_installations as $readers_installation)
                                <tr onclick="window.location.href= '/admin/reader_installations/{{$readers_installation->id}}'">
                                <td >{{ $readers_installation->id}}</td>
                                <td >{{ $readers_installation->reader_id}}</td>
                                <td >{{ $readers_installation->identifier}}</td>
                                <td >{{ $readers_installation->manufacturer}}</td>
                                <td >{{ $readers_installation->manufature_date}}</td>
                                <td >{{ $readers_installation->installation_date}}</td>
                                <td >{{ $readers_installation->expiration_date}}</td>
                                <td >{{ $readers_installation->address_id}}</td>
                                <td >{{ $readers_installation->country}},{{ $readers_installation->county_or_city}},{{ $readers_installation->address}}</td>
                                <td >{{ $readers_installation->user_id}}</td>
                                <td >{{ $readers_installation->name}},{{ $readers_installation->surname}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($readers_installation->count() == 0)
                    <div style="width: 100%; background-color:#f2f2f2;margin-top:5px;">
                        <h2 style="padding-left:5px">Nav skaitītāju instalācijas.</h2>
                        <h2 style="padding-left:5px">Vai vēlies 
                            <a href="" style="text-decoration: none; color:#003035">pievienot</a>
                            ?
                        </h2>
                    </div>
                @endif
                <div style="margin-top:10px">
                    <a href="/admin/reader_installations/create" class="button_right2" style="color: white" id="default_button2">Pievienot</a>
                </div>
            </div>
        </div>
    </main>
</body>
</x-layout>