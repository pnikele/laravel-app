<x-layout>
<main style="  box-sizing: border-box;width:100% ;padding:20px;height:100%;">
    <div id="card" style=" box-sizing: border-box;margin:0;padding:25px;height:100%">
        <h2>{{ $announcement->title}}</h2>
        <div class="body" style="color:gray;font-size:16px">{{ ($announcement->body)}}</div>
        <a id="default_button" style="width: fit-content;margin-top:10px;" href="/" >Atpakaļ</a>
    </div>
</main>

</x-layout>