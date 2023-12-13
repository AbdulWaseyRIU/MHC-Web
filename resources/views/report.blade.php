@extends('Layout.app')
@section('content')
<main>
    <div id="pdf-content">
        <div class="container">
            <div class="wrapper">
                <img class="background-image" src="{{ asset('graphics/template.jpg')}}" alt="">

                <div class="row">
                    <div class="column">

                    </div>
                    <div class="column">Logo</div>
                </div>
                <table>
                    <tr>
                        <th>DATE OF ANALYSIS</th>
                        <th>Report No.</th>
                        <th>MATERNITY HEALTHCARE</th>
                    </tr>
                    <tr>
                        <td><p>{{ now()->format('Y-m-d H:i:s') }}</p></td>
                        <td><p> {{ rand(1, 100) }}</p></td>
                        <td>Phone</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Email</td>
                    </tr>
                </table>
                <div class="patient-details">
                    <p>Report to</p>
                    <p>NAME:XYZ </p>
                    <p>AGE:31</p>
                    <p>Phone:051-MHCSystem</p>
                    <p>Email:MHC@MHC.COM</p>
                </div>
                <p></p>
                <table>
                    <tr>
                        <th>ANALYSIS TYPE</th>
                        <th>ACCURACY LEVEL</th>
                        <th>RESULT</th>
                    </tr>
                    <tr>
                        <td>Gender Prediction</td>
                        <td>89&percnt;</td>
                        <td>Male</td>
                    </tr>
                    <tr>
                        <td>Fetal growth Assessment</td>
                        <td>92&percnt;</td>
                        <td>Normal</td>
                    </tr>
                </table>   <button class="report-link" onclick="generatePDF()">Download PDF</button>
           <div class="recommendations">     <p>Recommendations and Follow-up: (Based on growth)</p>
                <p>- Follow-up Actions: [Recommended actions or further tests] </p>
                <p>- Guidance: [Instructions based on findings]</p>
            </div>
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
