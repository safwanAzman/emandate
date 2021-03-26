
<li class="relative px-2 py-1 ">
    <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer
        @if(Route::current()->uri == $uri)
        bg-blue-700 p-1 rounded-lg hover:text-white
        @else
        hover:text-blue-300
        @endif" href="{{$route}}">
        {{$slot}}
        <span class="ml-4">{{$title}}</span>
    </a>
</li>