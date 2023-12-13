<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script>
        document.getElementById("menu-toggle").addEventListener("change", function () {
            document.body.classList.toggle("menu-open", this.checked);
        });
    </script>
    <script>
e delay time as needed

    function generatePDF() {
        var element = document.getElementById('pdf-content'); // Replace 'pdf-content' with the ID of the main content div
        html2pdf(element);
    }
    </script>
    <title>Maternity Health Care System</title>

</head>
<body>
@include('Layout.header')
@yield('content')
@include('Layout.footer')
</body>
</html>

