<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Музыка') }}
        </h2>
    </x-slot>



<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach($data as $row)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    

                <p>{{ $row['id'] }}. {{ $row['name'] }}</p>
                
                <audio controls="" src="{{asset('upload')}}/{{$row['name']}}"></audio><br>

                <form method="POST" action="{{ Route('insert.comment') }}">
                {{ @csrf_field() }}
                    <input type="hidden" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="music_id" value="{{ $row['id'] }}">
                    <input type="text" name="comment" placeholder="Оставьте комментарий!"></input>
                    <input type="submit">
                </form><br>
                </div>

            </div><br><br>
            @endforeach
        </div>
    </div>
</div>



<div>{{ Auth::user()->id }}</div>
</x-app-layout>