<div>
    <a href="{{ route('movie.show', $movie['id']) }}" class="group">
        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
            <img src="{{ 'https://image.tmdb.org/t/p/original/'.$movie['poster_path'] }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-fit group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-lg text-gray-700">
            {{ $movie['title'] }}
            </h3>
            <div class="">
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
                <div class="flex items-center">

                <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>

                <p class="text-black ml-2">
                    {{ $movie['vote_average'] * 10 }}%
                    |
                    {{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}
                </p>


                </div>
                <p class="sr-only">4 out of 5 stars</p>
            </div>
            <p class="text-black italic text-xs">
                @foreach ($movie['genre_ids'] as $genre)
                {{ $genres->get($genre) }}@if (!$loop->last), @endif
                @endforeach
            </p>
        </div>
    </a>
</div>
