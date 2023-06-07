<x-layout>
    <main style="  box-sizing: border-box;width:100% ;padding:20px;height:100%;flex:5;">
        <div id="card" style=" box-sizing: border-box;margin:0;padding:25px;height:100%">
            <h3 class="font-normal text-xl py-4 -ml-5 border-l-4">
                Kontakti
            </h3>
            <div class="contacts">
                @forelse ($contacts as $contact)
                    {{-- @include ('announcements.card') --}}
                    <div style="display:flex;margin-bottom: 5px">
                        <div style="flex:1;text-align:left">{{ $contact->name}}</div>
                        <div style="flex:1;text-align:center">{{ $contact->position}}</div>
                        <div style="flex:1;text-align:right">{{ $contact->phone_number}}</div>
                    </div>
                @empty
                    <div>Nav nevienu kontaktu!</div>
                @endforelse
            </div>
        </div>
    </main>
</x-layout>