@props(['name'])

@error($name)
    <p style="color:red; font-size:x-small; margin-bottom:-10px; margin-top:5px">{{ $message }}</p>
@enderror
