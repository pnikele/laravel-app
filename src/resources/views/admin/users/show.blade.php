<x-layout>
    <main style="flex:5; height:100%">

        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <div class="form-group row">
                    <h2>Lietotāja dati</h2>
                    <table id="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="text-align: left">Id</th>
                                <th style="text-align: left">Vārds</th>
                                <th style="text-align: left" >Uzvārds</th>
                                <th style="text-align: left" >E-pasts</th>
                                <th style="text-align: left" >Ir_Admin</th>
                                <th style="text-align: left" >Izveidots</th>
                                <th style="text-align: left" >Labots</th>
                                <th style="text-align: left"></th>
                            </tr>
                        </thead>
                        <tbody >
                                    {{-- <tr onclick="window.location.href= '/admin{{$user->path()}}'"> --}}
                                    <td >{{ $user->id}}</td>
                                    <td >{{ $user->name}}</td>
                                    <td >{{ $user->surname}}</td>
                                    <td >{{ $user->email}}</td>
                                    <td >{{ $user->is_admin}}</td>
                                    <td >{{ $user->created_at}}</td>
                                    <td >{{ $user->updated_at}} </td>
                                    <td>
                                        <a style="text-decoration: none;" href="/admin/users/{{$user->id.'/edit'}}">Labot</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div style="margin-top: 10px">
                    <h2>Skaitītāji adresei</h2>
                    list of skaititaji
                    @forelse ($readers as $reader)
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
                                            <tr>
                                            <td >{{ $reader->identifier}}</td>
                                            <td >{{ $reader->manufacturer}}</td>
                                            <td >{{ $reader->manufature_date}}</td>
                                            <td >{{ $reader->installation_date}}</td>
                                            <td >{{ $reader->expiration_date}}</td>
                                        </tr>
                                </tbody>
                            </table>
                            @if($readers->count() == 0)
                            <div style="width: 100%; background-color:#f2f2f2;margin-top:5px;">
                                <h2 style="padding-left:5px">Šajai adresei nav uzstādītu skaitītāju.</h2>
                            </div>
                        </div>
                    @endif
                    @empty
                        <div>Šajai adresei nav skaitītāju.</div>
                    @endforelse
                </div> --}}
            </div>
        </div>
    </main>
    </x-layout>