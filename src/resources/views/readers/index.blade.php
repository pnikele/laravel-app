<x-layout>
    <body>
    <main style="flex:5;">
        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <h1 style="color: #558388;">Skaitītāji</h1>
                <div class="form-group row">
                    <table id="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="text-align: left">Identifikators</th>
                                <th style="text-align: left" >Ražotājs</th>
                                <th style="text-align: left" >Izgatavošanas datums</th>
                                <th style="text-align: left" >Uzstādīšanas datums</th>
                                <th style="text-align: left" >Nākamās apkopes datums</th>
                                <th style="text-align: left" >Adrese</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($readers as $readeritems)
                                    <tr onclick="window.location.href= '/readers/{{$readeritems->readerinst_id}}'">
                                    <td >{{ $readeritems->identifier}}</td>
                                    <td >{{ $readeritems->manufacturer}}</td>
                                    <td >{{ $readeritems->manufature_date}}</td>
                                    <td >{{ $readeritems->installation_date}}</td>
                                    <td >{{ $readeritems->expiration_date}}</td>
                                    <td >{{ $readeritems->country}},{{ $readeritems->county_or_city}},{{ $readeritems->address}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($readers->count() == 0)
                    <div style="width: 100%; background-color:#f2f2f2;margin-top:5px;">
                        <h2 style="padding-left:5px">Jums nav skaitītāju.</h2>
                    </div>
                    @endif
                </div>
                {{-- @empty
                    <div>Šajai adresei nav skaitītāju.</div>
                @endforelse --}}

                {{-- <div style="margin-top:10px">
                    <a href="/addresses/create" class="button_right2" style="color: white" id="default_button2">Pievienot</a>
                </div> --}}
            </div>
        </div>
    </main>
</body>
</x-layout>