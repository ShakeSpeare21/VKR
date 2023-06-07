<?php
use App\Models\Music;
use App\Http\Controllers\MusicController;
$musics = DB::table('musics')->select('*')->get();
?>

</hr>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Главная') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1>Загрузить</h1><br>
    <form method="POST" action="{{ Route('insert.file') }}" enctype="multipart/form-data">
        {{ @csrf_field() }}
        <input type="file" name="song"><br><br>
        <p>
            @if ($errors->has('song'))
            {{ $errors-> first('song')}}<br>
            @endif
        <input type="submit" name="Upload">
    </form>
    @foreach($musics as $music)
    <p>{{ $music->name }}</p><br><audio controls="" src="{{ asset('public/uploads/' . $music -> name) }}"></audio><br><br>
    @endforeach
</hr>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">


</x-app-layout>
<div>
    

</body>
</html>