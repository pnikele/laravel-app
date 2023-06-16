<x-layout>
    <body>
    <main style="flex:5;">
        <div class="announcements">
            <div style="min-height:200px; padding:20px;" id="card">
                <h1 style="color: #558388;">Lietotāji</h1>
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Meklēt.." title="Ieraksti frāzi">
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
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($users as $user)
                                <tr onclick="window.location.href= '/admin/users/{{$user->id}}'">
                                <td >{{ $user->id}}</td>
                                <td >{{ $user->name}}</td>
                                <td >{{ $user->surname}}</td>
                                <td >{{ $user->email}}</td>
                                <td >{{ $user->is_admin}}</td>
                                <td >{{ $user->created_at}}</td>
                                <td >{{ $user->updated_at}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($users->count() == 0)
                    <div style="width: 100%; background-color:#f2f2f2;margin-top:5px;">
                        <h2 style="padding-left:5px">Nav lietotāju.</h2>
                        <h2 style="padding-left:5px">Vai vēlies 
                            <a href="" style="text-decoration: none; color:#003035">pievienot</a>
                            ?
                        </h2>
                    </div>
                @endif
                <div style="margin-top:10px">
                    <a href="/admin/users/create" class="button_right2" style="color: white" id="default_button2">Pievienot</a>
                </div>
            </div>
        </div>
    </main>
</body>
</x-layout>