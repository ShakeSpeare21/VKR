<x-app-layout>


@foreach($data as $row)
<audio controls="" src="{{asset('upload')}}/{{$row['name']}}"></audio>

@endforeach
</x-app-layout>