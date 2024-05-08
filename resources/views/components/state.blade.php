@props(['heading', 'state'])
<div class="flex items-center gap-2 w-1/2 mb-4">
    <h3 class="text-xl font-bold">{{$heading}}:</h3>
    <span class="text-md font-medium">{{ $state }}</span>
</div>