<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.login.partials.head')
  </head>

  <body>
    
    @include('layouts.login.partials.header')
    
    @yield('content')
    
    @include('layouts.login.partials.footer')
    
    @include('layouts.login.partials.footer-scripts')
  
  </body>
</html>