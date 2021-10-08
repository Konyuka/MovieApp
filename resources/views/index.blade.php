@extends('layout.main')

@section('content')


    <div class="bg-gray-200">
        <h2 class="p-10 text-2xl font-bold leading-7 text-black sm:text-3xl sm:truncate">
            Popular Movies
        </h2>
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Movies</h2>

            <div class="mb-10 grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

             @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
             @endforeach

            <!-- More products... -->
            </div>
        </div>

        <h2 class="p-10 text-2xl font-bold leading-7 text-black sm:text-3xl sm:truncate">
            Playing Movies
        </h2>
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Movies</h2>

            <div class="mb-10 grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

             @foreach ($playingMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres" />
             @endforeach

            <!-- More products... -->
            </div>
        </div>
    </div>


@endsection
