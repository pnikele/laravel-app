<x-layout>
    <main style="flex:5; height:100%">

        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <div class="form-group row">
                    <table id="table2" style="width: 100%">
                        <tbody>
                                    <tr>
                                    <td >{{ $address->country}}</td>
                                    <td >{{ $address->county_or_city}}</td>
                                    <td >{{ $address->address}}</td>
                                    <td >{{ $address->user->name}} {{ $address->user->surname}} </td>
                                    <td >{{ $address->user->email}} </td>
                                    <td>
                                        <a style="text-decoration: none;" href="/admin/addresses{{$address->pathid().'/edit'}}">Labot</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin-top: 10px">
                    <h2>Skaitītāji adresei</h2>
                    {{-- list of skaititaji --}}
                    <div class="form-group row">
                        <table id="table2" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="text-align: left">Identifikators</th>
                                    <th style="text-align: left" >Ražotājs</th>
                                    <th style="text-align: left" >Izgatavošanas datums</th>
                                    <th style="text-align: left" >Uzstādīšanas datums</th>
                                    <th style="text-align: left" >Nākamās apkopes datums</th>
                                </tr>
                            </thead>
                            <tbody>       
                                @foreach ($readers as $reader)            
                                        <tr>
                                        <td >{{ $reader->identifier}}</td>
                                        <td >{{ $reader->manufacturer}}</td>
                                        <td >{{ $reader->manufature_date}}</td>
                                        <td >{{ $reader->installation_date}}</td>
                                        <td >{{ $reader->expiration_date}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>                
                        @if($readers->count() == 0)
                            <div style="width: 100%; margin-top:5px;">
                                <h2 style="padding-left:5px">Šajai adresei skaitītāju.</h2>
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </main>
    </x-layout>