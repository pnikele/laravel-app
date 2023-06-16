<x-layout>
    <main style="flex:5; height:100%">
        <div class="announcements" style="width:100%">
            <div style="min-height:200px; padding:20px;" id="card">
                <div class="form-group row">
                </div>
                <div style="margin-top: 10px">
                    <h2>Skaitītāja dati</h2>
                    {{-- list of skaititaji --}}
                    @foreach ($readers as $readeritems)
                        <div class="form-group row">
                            <table id="table2" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: left;background-color:#62A5AD">Identifikators</th>
                                        <th style="text-align: left;background-color:#62A5AD" >Ražotājs</th>
                                        <th style="text-align: left;background-color:#62A5AD" >Izgatavošanas datums</th>
                                        <th style="text-align: left;background-color:#62A5AD" >Uzstādīšanas datums</th>
                                        <th style="text-align: left;background-color:#62A5AD" >Nākamās apkopes datums</th>
                                        <th style="text-align: left;background-color:#62A5AD" >Adrese</th>
                                    </tr>
                                </thead>
                                <tbody>
                                            <tr >
                                            <td >{{ $readeritems->identifier}}</td>
                                            <td >{{ $readeritems->manufacturer}}</td>
                                            <td >{{ $readeritems->manufature_date}}</td>
                                            <td >{{ $readeritems->installation_date}}</td>
                                            <td >{{ $readeritems->expiration_date}}</td>
                                            <td >{{ $readeritems->country}},{{ $readeritems->county_or_city}},{{ $readeritems->address}}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
                <div style="margin-top: 10px">
                    <h2>Skaitītāja rādījumi</h2>
                </div>
                <div style="margin-top: 10px">
                    <p>Aktuālais mērījums: {{ last($thisyearorders)}}</p>
                </div>
                <div style="position: relative; margin: auto;height: 80vh; width: 70%;margin-top:50px">
                    <canvas  id="myChart"></canvas>
                </div>
                {{-- <p style="font-size:small"> --}}
                    {{-- {{Js::from($thisyearorders)}} --}}
                    {{-- {{json_encode($thisyearorders,JSON_NUMERIC_CHECK)}} --}}
                {{-- </p> --}}

            </div>
        </div>
    </main>
    <script>
        const ctx = document.getElementById('myChart');
        // {{Js::from($thisyearorders)}}
        // {{json_encode($thisyearorders,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)}}
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
              label: '2021.gada dati',
              data:{{json_encode($thisyearorders,JSON_NUMERIC_CHECK)}}, //get as numbers not as strings
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }

          }
        });
      </script>
    </x-layout>