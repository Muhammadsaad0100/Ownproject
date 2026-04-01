
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

    {{-- Header --}}
    @include('layouts.header')

    {{-- Navigation / Sidebar --}}
    @include('layouts.navigation')

    {{-- Main Content --}}
    <div id="main-content">
        @yield('content')
    </div>

    {{-- Theme / Settings panel (optional) --}}
    @include('layouts.themes')

    {{-- Footer Scripts --}}
    @include('layouts.footerscript')
    
<script>
    $(document).ready(function() {
    $('#leadList').DataTable({
        // Basic configuration
        pageLength: 10,
        responsive: true,
        
        // Optional: Add these if you want specific features
        searching: true,
        ordering: true,
        paging: true,
        info: true,
        
        // If your table has specific column definitions
        columnDefs: [
            // Example: disable sorting on last column
            // { orderable: false, targets: -1 }
        ]
    });
});
</script>
</body>
</html>