<x-layout>
    <body>
    <main style="flex:5;">
        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <h1 style="color: #558388;">Adreses</h1>
                <table id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="text-align: left">Valsts</th>
                            <th style="text-align: left" >Novads vai valstspilsēta</th>
                            <th style="text-align: left" >Adrese</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($addresses as $address)
                            {{-- <tr onclick="window.location.href= '{{$address->path().'/edit'}}'"> --}}
                                <tr onclick="window.location.href= '{{$address->path()}}'">
                                <td >{{ $address->country}}</td>
                                <td >{{ $address->county_or_city}}</td>
                                <td >{{ $address->address}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($addresses->count() == 0)
                    <div style="width: 100%; background-color:#f2f2f2;margin-top:5px;">
                        <h2 style="padding-left:5px">Jums nav adreses.</h2>
                        <h2 style="padding-left:5px">Vai vēlies 
                            <a href="" style="text-decoration: none; color:#003035">pievienot</a>
                            ?
                        </h2>
                    </div>
                @endif
                <div style="margin-top:10px">
                    <a href="/addresses/create" class="button_right2" style="color: white" id="default_button2">Pievienot</a>
                </div>
            </div>
        </div>
    </main>
</body>
</x-layout>