<x-layout>
    {{-- using tailwind --}}
    {{-- $classAttendance --}}
    {{-- show div with classname avgattendance and total conducted and attended --}}
    <div class="flex flex-col h-full p-16 overflow-hidden overflow-y-scroll">
        <div class="flex items-center flex-wrap justify-start w-full bg-white">
 
            <x-state heading="Course" :state="$classAttendance[0]->name" />
            <x-state heading="Total Classes" :state="$classAttendance->total_conducted" />
            <x-state heading="Classes Attended" :state="$classAttendance->total_attended" />
            <x-state heading="Average Attendance" :state="$classAttendance->average" />
        </div>

        {{-- show tale with all attendances --}}
        <div class="flex flex-col  mt-8">
            <table class="divide-y divide-gray-300 ">
                <thead>
                    <tr class=" bg-indigo-800 text-white ">
                        <th class="py-4">Sr/no</th>
                        <th class="py-4">Date</th>
                        <th class="py-4">Status</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-300">
                    @foreach($classAttendance as $attendance)
                    <tr class=" text-center ">
                        <td class="py-4">{{ $loop->iteration }}</td>
                        <td class="py-4">{{ $attendance->date }}</td>
                        <td class="py-4">{{ $attendance->is_present?"P":"A" }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
    </div>
</x-layout>