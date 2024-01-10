@extends('Layout.app')
@section('content')
<main>
    <div id="pdf-content">
        <div class="main-container">
            <div class="wrapper">

                <div class="row">
                    <div class="column">
                        <img id="logo" src="{{ asset('graphics/logo1-modified.png')}}" alt=""><p>Maternity Health Care</p>
                    </div>
                    <div class="column"></div>
                </div>


                <table class="previousreports">
                    <tr>
                        <th>Report No.</th>
                        <td>{{ $user->uid }}</td>
                        <td>{{ $user->uid }}</td>

                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>John Doe</td>
                        <td>John Doe</td>
                    </tr>
                    <tr>
                        <th>Gender Detection</th>
                        <td>Male</td>
                        <td>Female</td>
                    </tr>
                    <tr>
                        <th>Gender Accuracy</th>
                        <td>72</td>
                        <td>64</td>
                    </tr>
                    <tr>
                        <th>Growth Detection</th>
                        <td>Normal</td>
                        <td>Abormal</td>
                    </tr>
                    <tr>
                        <th>Growth Accuracy</th>
                        <td>81</td>
                        <td>91</td>
                    </tr>

                </table>

                <div class="disclaimer">
                    Disclaimer:
                    <p>"We do not store your uploaded data. This report is for informational purposes only." </p>
                    <p>"Users are advised to seek professional medical advice for any concerns. Use of this report is at
                        your own discretion." </p>

                </div>    <button class="report-link" onclick="generatePDF()">Download PDF</button>
            </div>
        </div>
    </div>
    <script>
        function generatePDF() {
            var element = document.getElementById('pdf-content');

            // Remove the button before generating the PDF
            var button = document.querySelector('.report-link');
            if (button) {
                button.remove();
            }

            html2pdf(element);
        }
    </script>
</main>
@endsection
