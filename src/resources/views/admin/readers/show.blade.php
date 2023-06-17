<x-layout>
    <main style="flex:5; height:100%">

        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <div class="form-group row">
                    <h2>Skaitītāja dati</h2>
                    <table id="table2" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="text-align: left">Id</th>
                                <th style="text-align: left">Identifikators</th>
                                <th style="text-align: left" >Izgatavotājs</th>
                                <th style="text-align: left" >Izgatavošanas datums</th>
                                <th style="text-align: left" >Izveidots</th>
                                <th style="text-align: left" >Labots</th>
                                <th style="text-align: left"></th>
                            </tr>
                        </thead>
                        <tbody >
                                    {{-- <tr onclick="window.location.href= '/admin{{$user->path()}}'"> --}}
                                    <td >{{ $reader->id}}</td>
                                    <td >{{ $reader->identifier}}</td>
                                    <td >{{ $reader->manufacturer}}</td>
                                    <td >{{ $reader->manufature_date}}</td>
                                    <td >{{ $reader->created_at}}</td>
                                    <td >{{ $reader->updated_at}} </td>
                                    <td>
                                        <a style="text-decoration: none;" href="/admin/readers/{{$reader->id.'/edit'}}">Labot</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    </x-layout>