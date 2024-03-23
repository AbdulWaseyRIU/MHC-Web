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



    <table border="1" class="previousreports">
        <thead>
            <tr>
                <th>Confidence</th>
                <th>Label</th>
                <th>Analysis Type</th>

                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userData as $data)
            <tr>
                <td>{{ $data['confidence'] }}</td>
                <td>{{ $data['label'] }}</td>
                <td>{{ $data['analysisType'] }}</td>
                <td>{{ $data['Date'] }}</td>
                <td>
                    <form action="{{ route('destroy', ['userId' => $data['userId'], 'date' => $data['Date']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
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
<style>
 .main-container form {
    width:auto;
    background-color: #ffffff; /* Set specific background color */
}

/* Reset or override other properties */
.main-container form input,
.main-container form textarea,
.main-container form select {
    /* Reset background color */
    background-color: initial;
    /* Reset other properties or set them to desired values */
    /* Example: */
    border: 1px solid #ccc; /* Reset or set border */
    color: #333; /* Reset or set text color */
    /* Add more properties as needed */
}
    .delete-button {
    background-color: #f44336; /* Red */
    border: none;
    color: white;
    padding: 8px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    transition-duration: 0.4s;
}

.delete-button:hover {
    background-color: #d32f2f; /* Darker red on hover */
}
</style>
@endsection
