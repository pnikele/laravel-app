<div class="card_index" onclick="window.location.href= '{{$announcement->path()}}'" style="min-height:200px; padding:20px;cursor: pointer;" id="card"> 
    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4">
        <a href="{{ $announcement->path() }}" style="text-decoration:none">{{ $announcement->title}}</a>
    </h3>
    <div class="excerpt" style="color:gray;margin-bottom:10px">{{ ($announcement->excerpt)}}</div>
</div>