<x-layout>
    <body>
    <main style="flex:5;">
        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <h1 style="color: #558388;">Skaitītāji</h1>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Meklēt.." title="Ieraksti frāzi">
                <table id="table" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="text-align: left">Id</th>
                            <th style="text-align: left">Identifikators</th>
                            <th style="text-align: left" >Izgatavotājs</th>
                            <th style="text-align: left" >Izgatavošanas datums</th>
                            <th style="text-align: left" >Izveidots</th>
                            <th style="text-align: left" >Labots</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($readers as $reader)
                                <tr onclick="window.location.href= '/admin/readers/{{$reader->id}}'">
                                <td >{{ $reader->id}}</td>
                                <td >{{ $reader->identifier}}</td>
                                <td >{{ $reader->manufacturer}}</td>
                                <td >{{ $reader->manufature_date}}</td>
                                <td >{{ $reader->created_at}}</td>
                                <td >{{ $reader->updated_at}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($readers->count() == 0)
                    <div style="width: 100%; background-color:#f2f2f2;margin-top:5px;">
                        <h2 style="padding-left:5px">Nav skaitītāju.</h2>
                        <h2 style="padding-left:5px">Vai vēlies 
                            <a href="" style="text-decoration: none; color:#003035">pievienot</a>
                            ?
                        </h2>
                    </div>
                @endif
                <div style="margin-top:10px">
                    <a href="/admin/readers/create" class="button_right2" style="color: white" id="default_button2">Pievienot</a>
                </div>
            </div>
        </div>
    </main>
</body>
</x-layout>