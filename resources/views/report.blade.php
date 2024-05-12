@extends('Layout.app')
@section('content')
<main>

        <div class="main-container">    <div id="pdf-content">
            <div class="wrapper">


                <div class="row">
                    <div class="column">
                        <img id="logo" src="{{ asset('graphics/logo1-modified.png')}}" alt=""><p>Maternity Health Care</p>
                    </div>

                </div>
                <table class="custom-table">
                    <tr>
                        <th>DATE OF ANALYSIS</th>
                        <th>Report No.</th>
                        <th>MATERNITY HEALTHCARE</th>
                    </tr>
                    <tr>
                        <td><p>{{ now()->format('Y-m-d H:i:s') }}</p></td>
                        <td><p> {{ rand(1, 100) }}</p></td>
                        <td><strong>Phone:</strong>051-8881113</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><strong>Email:</strong>Admin@mhc.com</td>

                    </tr> <tr>
                        <td></td>
                        <td></td>
                        <td><strong>Report To:</strong>UserID</td>

                    </tr>

                </table>

                <p></p>

                @isset($result['prediction'])
                    <table>
                    <tr>
                        <th>ANALYSIS TYPE</th>
                        <th>ACCURACY LEVEL</th>
                        <th>RESULT</th>
                    </tr>

                      <tr>
                        <td>Gender Prediction</td>
                        <td>

                                @if ($result['prediction'] == 'unclassified')
                                    ----------------
                                @else
                                    {{ number_format($result['probability'] * 100, 1) }}&percnt;
                                @endif

                        </td>
                        <td>
                            @isset($result['prediction'])
                                @if ($result['prediction'] == 'unclassified')
                                    Wrong Image Uploaded
                                @else
                                    {{ $result['prediction'] }}
                                @endif
                                @endisset
                        </td>
                    </tr>



                </table>
                @endisset
                @isset($result['fetal_weight_status'])
                <table>
                <tr>
                    <th>ANALYSIS TYPE</th>
                    <th>RESULT</th>
                    @if ($result['fetal_weight_status'] == 'Abnormal')
                       <th>Remarks</th>
                       @endif

                </tr>

                  <tr>
                    <td>Growth Prediction</td>
                    <td>
                                {{ $result['fetal_weight_status'] }}


                    </td>
                    @if ($result['fetal_weight_status'] == 'Abnormal')               <td>

                            @if ($result['fetal_weight_percentile'] < 2.5)
                                <p>Your Baby is Weak</p>
                            @elseif ($result['fetal_weight_percentile'] > 97.5)
                                <p>Your Baby is Overweight</p>
                            @else
                                <p>Your Baby Growth is Normal</p>
                            @endif

                    </td> @endif
                </tr>



            </table>
            @endisset
                <div class="disclaimer">
                    Disclaimer:
                    <p>"We do not store your uploaded data. This report is for informational purposes only." </p>
                    <p>"Users are advised to seek professional medical advice for any concerns. Use of this report is at
                        your own discretion." </p>

                </div><button class="report-link" onclick="generatePDF()">Download PDF</button>
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
