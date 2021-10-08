@extends('layout.main')

@section('content')

<div class="bg-gray-200">

  <div class="max-w-2xl mx-auto py-16 px-4 sm:py-8 sm:px-6 lg:max-w-7xl lg:px-8">
    <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
      <!-- Image gallery -->
      <div class="flex flex-col-reverse">
        <!-- Image selector -->
        <div class="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
          <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
            <button id="tabs-1-tab-1" class="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50" aria-controls="tabs-1-panel-1" role="tab" type="button">
              <span class="sr-only">
                Angled view
              </span>
              <span class="absolute inset-0 rounded-md overflow-hidden">
                <img src="{{ 'https://image.tmdb.org/t/p/original/'.$movie['poster_path'] }}" alt="" class="w-full h-full object-center object-fit">
              </span>
              <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
              <span class="ring-transparent absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none" aria-hidden="true"></span>
            </button>

            <!-- More images... -->
          </div>
        </div>

        <div class="w-full aspect-w-1 aspect-h-1">
          <!-- Tab panel, show/hide based on tab state. -->
          <div id="tabs-1-panel-1" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
            <img src="{{ 'https://image.tmdb.org/t/p/original/'.$movie['poster_path'] }}" alt="Angled front view with bag zipped and handles upright." class="w-full h-full object-center object-cover sm:rounded-lg">
          </div>

          <!-- More images... -->
        </div>
      </div>

      <!-- Product info -->
      <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $movie['title'] }}</h1>

        <!-- Reviews -->
        <div class="mt-3">
          <h3 class="sr-only">Reviews</h3>
          <div class="flex items-center">
            <div class="flex items-center">

              <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>


              <p class="text-black ml-2">

                  {{ $movie['vote_average'] * 10 }}% |

                  {{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }} |

                   @foreach ($movie['genres'] as $genre)
                     {{ $genre['name'] }}@if (!$loop->last), @endif
                    @endforeach </p>


            </div>
            <p class="sr-only">4 out of 5 stars</p>
          </div>
        </div>

        <div class="mt-6">
          <h3 class="sr-only">Description</h3>

          <div class="text-base text-gray-700 space-y-6">
            <p>{{ $movie['overview'] }}</p>
          </div>
        </div>

        <section aria-labelledby="details-heading" class="mt-2">
          <h2 id="details-heading" class="sr-only">Additional details</h2>

          <div class="border-t divide-y divide-gray-200">
            <div>
              <h3>
                <!-- Expand/collapse question button -->
                <button type="button" class="group relative w-full py-1 flex justify-between items-center text-left" aria-controls="disclosure-1" aria-expanded="false">
                  <!-- Open: "text-indigo-600", Closed: "text-gray-900" -->
                  <span class="text-gray-900 text-sm font-medium">
                    Featured Crew
                  </span>
                </button>
              </h3>
              <div class="pb-6 prose prose-sm" id="disclosure-1">
                <ul role="list">
                    @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index < 9)
                        <li>{{ $crew['original_name'] }}  | <span class="text-indigo-600 italic"> {{ $crew['job'] }}</span></li>
                        @endif
                    @endforeach
                </ul>
              </div>
            </div>

          </div>
        </section>

        @if (count($movie['videos']['results']) > 0)
            <form class="mt-2">
                <div class="mt-1 flex sm:flex-col1">
                    <a href="https://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" target="_blank" type="submit" class="max-w-xs flex-1 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 sm:w-full">Play Trailer</a>

                    <button type="button" class="ml-4 py-3 px-3 rounded-md flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                        <span class="sr-only">Play Trailers</span>
                    </button>
                </div>
            </form>
        @endif

      </div>
    </div>
  </div>


  <div class="bg-gray-200">
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Cast</h2>

        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($movie['credits']['cast'] as $cast)
            @if ($loop->index < 4)
            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="{{ 'https://image.tmdb.org/t/p/original/'.$cast['profile_path'] }}" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-fit lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-lg text-gray-700">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $cast['character'] }}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
  </div>


</div>

@endsection
