<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
</head>
<body class="bg-gray-500">
    @include('layouts.navbar')
    <div class="p-12">
        @yield('container')
        @if(session('success'))
          <div class="mt-5 p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            {{ session('success') }}
          </div>
        @endif
    </div>
</body>
</html>

<script>
    function sortTableByUmur() {
        const table = document.getElementById('table-pasien');
        const tbody = table.querySelector('tbody');
        const rows = Array.from(tbody.getElementsByTagName('tr'));

        rows.sort((a, b) => {
            const umurA = parseInt(a.cells[4].innerText);
            const umurB = parseInt(b.cells[4].innerText);
            return umurB - umurA;
        });

        rows.forEach(row => tbody.appendChild(row));
    }
</script>