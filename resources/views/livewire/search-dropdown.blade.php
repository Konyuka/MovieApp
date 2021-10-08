<div class="flex-1 flex justify-center px-2 lg:ml-6 lg:justify-end">
    <div class="max-w-lg w-full lg:max-w-xs relative">
        <label for="search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <!-- Heroicon name: solid/search -->
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
            </div>
            <input wire:model.debounce.500ms="search" id="search" name="search" class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-gray-700 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 sm:text-sm" placeholder="Search" type="search">
            <div class="absolute w-full pt-4 z-10">
                <ul role="list" class="divide-y divide-gray-200 bg-gray-800 px-5 rounded-md">
                     @if (count($searchResults) > 0)

                        @foreach ($searchResults as $result)
                        <li class="py-2 group">
                        <div class="flex space-x-3">
                            <img class="h-10 w-10 rounded" src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="">
                            <div class="flex-1 space-y-1">
                            <div class="flex items-center justify-between">
                                <a href="{{ route('movie.show', $result['id']) }}" class="text-sm font-medium group-hover:text-gray-300">{{ $result['original_title'] }}</a>
                            </div>
                            </div>
                        </div>
                        </li>
                        @endforeach
                        @else
                        @if (strlen($search)>2)
                        <li class="py-2 group">
                            <div class="flex space-x-3">
                                <div class="flex-1 space-y-1">
                                    <div class="flex items-center justify-between">
                                        <a href="" class="text-sm font-medium group-hover:text-gray-300">No Result for <span class="text-gray-300">{{ $search }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endif
                    </ul>
            </div>


        </div>
    </div>
    <div wire:loading class="spinner absolute inset-y-0 right-4 pr-20 flex items-center pointer-events-none"></div>
</div>
