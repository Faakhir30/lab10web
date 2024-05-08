
{{-- using tailwind create card with classname and avergae on it--}}
<x-layout>

    <div class="flex flex-col w-screen items-center justify-center">
        <h1 class="text-4xl font-bold text-center mt-8 mb-16 underline underline-offset-8">Attendance</h1>

        <div class="flex flex-wrap justify-start gap-16 w-full">
            @foreach($averageAttendances as $class)
            <div class="bg-white rounded-lg shadow-lg p-4 w-96 cursor-pointer"
                onclick="window.location='{{ route('class.show', $class->id) }}'"
            >
                <div class="flex justify-between items-center flex-col gap-8">
                    <div class="flex items-center justify-center bg-gray-700 w-full p-2">
                        <h1 class="text-white font-bold">{{ $class->name }}</h1>
                    </div>
                    <div class="flex flex-col items-center justify-start gap-4 w-full">
                        <h4 class="text-lg font-bold mr-auto">Attendance: {{ number_format($class->average,2) }}%</h4>
                        {{-- div with filled border uptill avg attendance--}}
                        <div class="w-full h-2 bg-gray-200 rounded-full">
                            <div class="h-full rounded-full"
                                style="background-color: {{ $class->average > 75 ? 'green' : ($class->average > 50 ? 'yellow' : 'red') }} ; width: {{ $class->average }}%"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
