@props(['name'])

<x-form.field>
    {{-- <x-form.label name="{{ $name }}"/> --}}

    <input style="width:70%;font-size:large" 
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
