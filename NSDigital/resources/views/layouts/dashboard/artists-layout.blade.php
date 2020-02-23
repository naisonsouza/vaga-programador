<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.dashboard.partials.head')
  </head>

  <body>
    
    @include('layouts.dashboard.partials.header')
    
    @yield('content')
    
    @include('layouts.dashboard.partials.footer')
    
    @include('layouts.dashboard.partials.footer-scripts')
    
    @include('dashboard.artists.artist-scripts')
  
  </body>
</html>