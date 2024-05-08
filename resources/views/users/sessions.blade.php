<x-layout>
    <div class="flex flex-col h-full p-16 overflow-hidden overflow-y-scroll">
        <div class="flex items-center justify-center w-full bg-white gap-8">
            @foreach($classes as $class)
            <div class="bg-white rounded-lg shadow-lg p-4 w-1/4 cursor-pointer"
                onclick="#"
            >
                <div class=" flex flex-col items-center py-4 px-6 text-white" style="background: rgb(114, 5, 114);">
                    <div class="flex items-center justify-between w-full">
                        <h1 class="text-lg font-bold">{{ $class->name }}</h1>
                        <h1 class="text-lg ">Credit Hours: {{ $class->creditHours }}</h1>
                    </div>
                    <div class="flex items-center justify-start gap-8 w-full mt-8">
                        <h4 class="text-lg  mr-auto">{{ $class->start_time." " }}-{{" ".$class->end_time}}</h4>
                    </div>
                </div>
                <div class="w-full flex pt-1 justify-content-end">
                    <a href="{{ route('attendance.show', $class->id) }}" class="py-2 text-center ml-auto "
                        style="color: rgb(5, 78, 21);"
                        >View Attendance</a>
                </div>
             </div>
            

            @endforeach
        </div>

</x-layout>
