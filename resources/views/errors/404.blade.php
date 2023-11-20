@section('title', 'Page not found')

<x-app>
    <div class="flex flex-col justify-center mt-24">
       <div>
           <svg class="w-16 m-auto mb-5 text-black dark:text-white" fill="currentColor" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
               <path class="cls-1" d="M64,3A61,61,0,1,1,3,64,61.06,61.06,0,0,1,64,3m0-3a64,64,0,1,0,64,64A64,64,0,0,0,64,0Z"></path>
               <path class="cls-1" d="M86.26,94.81a1.47,1.47,0,0,1-.85-.26,38,38,0,0,0-24.09-6.7A37.48,37.48,0,0,0,42.6,94.54a1.5,1.5,0,1,1-1.72-2.46,40.5,40.5,0,0,1,20.23-7.22,41,41,0,0,1,26,7.22,1.5,1.5,0,0,1-.85,2.73Z"></path>
               <path class="cls-1" d="M43.83,60.63a9.34,9.34,0,0,1-8.28-5,1.5,1.5,0,1,1,2.64-1.41,6.39,6.39,0,0,0,11.27,0,1.5,1.5,0,1,1,2.65,1.41A9.37,9.37,0,0,1,43.83,60.63Z"></path>
               <path class="cls-1" d="M85.57,60.63a9.34,9.34,0,0,1-8.28-5,1.5,1.5,0,1,1,2.64-1.41,6.39,6.39,0,0,0,11.27,0,1.5,1.5,0,1,1,2.64,1.41A9.34,9.34,0,0,1,85.57,60.63Z"></path>
           </svg>
           <div class="prose prose-headings:!mb-0 mt-5 mx-auto text-center">
               <h1 >404</h1>
               <p>This page does not exist</p>
               <x-button href="{{ route('home') }}">Home Page</x-button>
           </div>
       </div>
    </div>
</x-app>
