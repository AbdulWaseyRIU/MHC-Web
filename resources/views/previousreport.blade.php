@extends('Layout.app')
@section('content')
<main>
    <div id="pdf-content">
        <div class="main-container">
            <div class="wrapper">

                <div class="row">
                    <div class="column">

                    </div>
                    <div class="column">Logo</div>
                </div>
                <table id="tablebigscreen">
                    <tr>
                        <th>Report No.</th>
                        <th>Name</th>
                        <th>Gender Detection</th>
                        <th>Gender Accuracy</th>
                        <th>Growth Detection</th>
                        <th>Growth Accuracy</th>

                    </tr>
                    <tr>
                        <td>{{ $user->uid }}</td>
                        <td>John Doe</td>
                        <td>Male</td>
                        <td>89%</td>
                        <td>Normal</td>
                        <td>92%</td>

                    </tr>
                    <tr>
                        <td>{{ $user->uid }}</td>
                        <td>Jane Doe</td>
                        <td>Female</td>
                        <td>95%</td>
                        <td>Above Average</td>
                        <td>88%</td>

                    </tr>
                </table>

                <table id="previousreports">
                    <tr>
                        <th>Report No.</th>
                        <td>{{ $user->uid }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>John Doe</td>
                    </tr>
                    <tr>
                        <th>Gender Detection</th>
                        <td>Male</td>
                    </tr>
                    <tr>
                        <th>Gender Accuracy</th>
                        <td>32</td>
                    </tr>
                    <tr>
                        <th>Growth Detection</th>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <th>Growth Accuracy</th>
                        <td>31</td>
                    </tr>
                    <th></th>
                    <tr>
                        <th>Report No.</th>
                        <td>{{ $user->uid }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>John Doe</td>
                    </tr>
                    <tr>
                        <th>Gender Detection</th>
                        <td>Male</td>
                    </tr>
                    <tr>
                        <th>Gender Accuracy</th>
                        <td>32</td>
                    </tr>
                    <tr>
                        <th>Growth Detection</th>
                        <td>Normal</td>
                    </tr>
                    <tr>
                        <th>Growth Accuracy</th>
                        <td>31</td>
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
