@extends('Layout.app')
@section('content')
<main>
    <div id="pdf-content">
        <div class="container">
            <div class="wrapper">
                <button class="report-link" onclick="generatePDF()">Download PDF</button>
                <div class="row">
                    <div class="column">
                        <h1>Report</h1>
                    </div>
                    <div class="column">Logo</div>
                </div>
                <table>
                    <tr>
                        <th>Report No.</th>
                        <th>Name</th>
                        <th>Gender Detection</th>
                        <th>Gender Accuracy</th>
                        <th>Growth Detection</th>
                        <th>Growth Accuracy</th>
                        <th>Image</th>
                    </tr>
                    <tr>
                        <td>12345</td>
                        <td>John Doe</td>
                        <td>Male</td>
                        <td>89%</td>
                        <td>Normal</td>
                        <td>92%</td>
                        <td><img src="sample-image.jpg" alt="Sample Image"></td>
                    </tr>
                    <tr>
                        <td>67890</td>
                        <td>Jane Doe</td>
                        <td>Female</td>
                        <td>95%</td>
                        <td>Above Average</td>
                        <td>88%</td>
                        <td><img src="another-sample-image.jpg" alt="Another Sample Image"></td>
                    </tr>
                </table>
                <p>Recommendations and Follow-up: (Based on growth)</p>
                <p>- Follow-up Actions: [Recommended actions or further tests] </p>
                <p>- Guidance: [Instructions based on findings]</p>

                <div class="disclaimer">
                    Disclaimer:
                    <p>"We do not store your uploaded data. This report is for informational purposes only." </p>
                    <p>"Users are advised to seek professional medical advice for any concerns. Use of this report is at
                        your own discretion." </p>

                </div>
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
