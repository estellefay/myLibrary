<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <link rel="stylesheet" href="{{ asset('css/base.css')}}">
    <title>{{ config('app.name') }} : @yield('title')</title>
  </head>
  <body>
    <header>
        @include('parts/header')
    </header>
    <main>
        <aside>
            @include('parts/aside')
        </aside>
      <section>
          @yield('content')
      </section>
    </main>
    <footer>
        @include('parts/footer')
    </footer>
  </body>
</html>
