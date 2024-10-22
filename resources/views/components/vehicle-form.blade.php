<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Request Form</title>
    <style>
        body {
            font-family: 'Poppins';
            font-size: 18px;
        }

        .form-container {
            width: 55em;
            padding: 35px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin: 5em auto;
            margin-bottom: 3em;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }

        h1 {
            font-size: 30px;
            text-align: center;
            margin-bottom: 10px;
            font-weight: 500;
        }

        p {
            margin-bottom: 15px;
            font-style: italic;
            margin-bottom: 30px;
        }

        .form-body {
            display: flex;
            flex-direction: column;
        }

        .input-group {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: -10em;
        }

        .input-field {
            display: flex;
            margin-bottom: 16px;
            width: 48%;
        }

        .input-field label {
            margin-right: 10px;
            width: 150px;
        }

        .input-field input,
        .input-field select,
        .passenger-field select {
            height: 35px;
            padding: 5px;
            border: 1px solid rgba(60, 54, 51, 0.5);
            border-radius: 10px;
            width: calc(100% - 160px);
            box-sizing: border-box;
        }

        .button-container {
            display: flex;
            align-items: center;
        }

        .add-datetime-btn {
            background-color: #0056b3;
            color: white;
            padding: 3px 8px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 5px;
            margin-bottom: 30px;
        }

        .remove-datetime-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 3px 8px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 5px;
            margin-bottom: 30px;
        }

        .inline-group {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        input[type="time"],
        select {
            width: 30%;
            padding: 10px;
            margin-bottom: 30px;
        }

        #date-time-container {
            max-height: 130px;
            overflow-y: auto;
            padding: 3px;
            border-radius: 10px;

        }

        .datetime-group {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .datetime-group .button-container {
            display: flex;
            align-items: center;
            margin-left: 5px;
        }

        .form-footer {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .submit-btn {
            background-color: #65558F;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
        }

        #signature-preview {
            margin-top: 15px;
            max-width: 100px;
            max-height: 100px;
            display: none;
        }

        .file-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 16px;
            border: 2px dashed #5b21b6;
            border-radius: 6px;
            cursor: pointer;
            margin-bottom: 16px;
        }

        .date-field {
            display: flex;
            flex-direction: column;
            width: 45%;
            align-items: center;
            margin-right: auto;
            margin-left: 1em;
        }

        .date-field input {
            width: 68%;
            margin-left: -20px;
        }

        #date_start {
            margin-left: 130px;
        }

        .below-label1 {
            display: block;
            margin-top: 5px;
            margin-left: 12em;
        }

        .below-label2 {
            display: block;
            margin-top: 5px;
            margin-left: 4em;
        }

        .add-passenger-btn,
        .remove-passenger-btn {
            padding: 3px 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-passenger-btn {
            background-color: #0056b3;
            color: white;
            margin-bottom: 45px;
            align-self: flex-start;
            margin-top: 5px;
        }

        .remove-passenger-btn {
            background-color: #ff4d4d;
            color: white;
            margin-bottom: 30px;
        }

        .add-passenger-btn:hover {
            background-color: #003d80;
        }

        .remove-passenger-btn:hover {
            background-color: #cc0000;
        }

        #passenger-container {
            display: flex;
            flex-direction: column;
            max-height: 80px;
            overflow-y: auto;
            margin-left: 615px;
        }

        #passenger-container .passenger-field {
            display: flex;
            align-items: center;
            flex-direction: row;
            gap: 10px;
            margin-bottom: 10px;
            width: 100%;
        }

        #passenger-container select {
            flex-grow: 1;
        }

        .passenger-field {
            display: flex;
            margin-bottom: 16px;
            width: 48%;
            align-items: center;
        }

        .passenger-field label {
            margin-left: 30px;
            width: 160px;
        }

        .passenger-field select {
            height: 35px;
            padding: 5px;
            border: 1px solid rgba(60, 54, 51, 0.5);
            border-radius: 10px;
            width: calc(100% - 160px);
            box-sizing: border-box;
            margin-left: 23px;
        }

        .required {
            color: red;
            top: 0;
        }

        .row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 8px;
        }

        @media (max-width: 768px) {
            .form-container {
                width: 90%;
                padding: 20px;
                margin: 2em auto;
                margin-top: 5em;
            }

            .input-group,
            .input-field {
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
            }

            .input-field input,
            .input-field select {
                width: 100%;
            }
        }


    </style>
</head>
<body>
@if ($errors->any())
    <script>
        let errorMessages = [];
        @foreach ($errors->all() as $error)
        errorMessages.push("{{ $error }}");
        @endforeach
        alert("Form submission failed. Please correct the following errors:\n\n" + errorMessages.join("\n"));
    </script>
@endif

@if(session('error'))
    <script>
        alert(" {{ session('error') }}");
    </script>
@endif

@if(session('success'))
    <script>
        alert(" {{ session('success') }}");
    </script>
@endif
<div class="form-container">
    <h1>Request For Use of Vehicle</h1>
    <p>(Note: Request for use of vehicle shall be made at least (2) days from the intended date use.
        Failure to use the vehicle at the given date/time forfeits one’s right to use the vehicle assigned.)</p>
    <div class="form-body">
        <form action="/vehicle/request" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <div class="input-group">
                <div class="input-field">
                    <label>Requesting Office<span class="required">*</span></label>
                    <select id="officeName" name="officeName" placeholder="Enter Purpose" required>
                        <option disabled selected>Select Office</option>
                        @foreach(App\Models\Office::all() as $office)
                            <option value="{{ $office->OfficeID }}" {{ old('officeName') == $office->OfficeID ? 'selected' : '' }}>
                                {{ $office->OfficeName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="input-field">
                    <label>Purpose<span class="required">*</span></label>
                    <input type="text" name="Purpose" placeholder="Enter Purpose" value="{{ old('Purpose') }}" required/>
                </div>
            </div>
            <div class="input-group">
                <div class="input-field">
                    <label>Destination<span class="required">*</span></label>
                    <input type="text" name="Destination" placeholder="Enter Place" value="{{ old('Destination') }}" required/>
                </div>
                <div class="passenger-field">
                    <label>Passenger Name/s<span class="required">*</span></label>
                    <select name="passengers[]" required>
                        <option disabled selected>Select a passenger</option>
                        @foreach(App\Models\Employee::all() as $passenger)
                            <option value="{{ $passenger->EmployeeID }}" {{ in_array($passenger->EmployeeID, old('passengers', [])) ? 'selected' : '' }}>
                                {{ $passenger->EmployeeName }}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="button-container">
                    <button class="add-passenger-btn" type="button" onclick="addPassenger()">+</button>
                </div>
            </div>
            <div id="passenger-container">
                <!-- New passenger fields will be appended here -->
            </div>
            <div id="date-time-container">
                <div class="input-group datetime-group">
                    <div class="input-field">
                        <label>Date</label>
                        <div class="date-field">
                            <input type="date" id="date_start" name="date_start[]" value="{{ old('date_start.0') }}" required/>
                            <label for="date_start" class="below-label1">Start <span class="required">*</span></label>
                        </div>
                        <div class="date-field">
                            <input type="date" id="date_end" name="date_end[]" value="{{ old('date_end.0') }}" required/>
                            <label for="date_end" class="below-label2">End <span class="required">*</span></label>
                        </div>
                    </div>
                    <div class="input-field">
                        <label>Time<span class="required">*</span></label>
                        <input type="time" name="time_start[]" value="{{ old('time_start.0') }}" required/>
                        <div class="button-container">
                            <button class="add-datetime-btn" type="button" onclick="addDateTime()">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <div class="input-field">
                    <label>Requester Name<span class="required">*</span></label>
                    <input type="text" name="RequesterName" placeholder="Enter Name" value="{{ old('RequesterName') }}" required/>
                </div>
                <div class="input-field">
                    <label>Requester Email <span class="required">*</span></label>
                    <input type="text" name="RequesterEmail" placeholder="Enter Email" value="{{ old('RequesterEmail') }}"  required/>
                </div>
            </div>

            <div class="input-group">
                <div class="input-field">
                    <label>Contact No. <span class="required">*</span></label>
                    <input type="text" name="RequesterContact" placeholder="Enter No." value="{{ old('RequesterContact') }}" required/>
                </div>
                <div class="input-field">
                    <label for="RequesterSignature">E-Signature <span class="required">*</span></label>
                    <div class="file-upload">
                        <input type="file" id="e-signature" name="RequesterSignature" style="display: none;"
                               onchange="previewSignature(event)" required>
                        <div class="e-signature-text" onclick="document.getElementById('e-signature').click();">
                            Click to upload e-sign.<br>Maximum file size: 31.46MB
                        </div>
                        <img id="signature-preview" alt="Signature Preview">
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <button class="submit-btn" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    function addPassenger() {
        const passengerField = document.createElement('div');
        passengerField.className = 'input-field passenger-field';
        passengerField.innerHTML = `
        <select name="passengers[]" required>
          <option disabled selected>Select a passenger</option>
            @foreach(App\Models\Employee::all() as $passenger)
                <option value="{{ $passenger->EmployeeID }}">{{ $passenger->EmployeeName }}</option>
            @endforeach
        </select>
        <button type="button" class="remove-passenger-btn" onclick="removePassenger(this)">-</button>
    `;
        document.getElementById('passenger-container').appendChild(passengerField);
    }

    function removePassenger(button) {
        const passengerField = button.parentElement;
        passengerField.remove();
    }


    function addDateTime() {
        const dateTimeContainer = document.getElementById('date-time-container');
        const defaultDateTimeField = document.querySelector('.datetime-group');
        const newDateTimeField = defaultDateTimeField.cloneNode(true);
        newDateTimeField.querySelectorAll('input').forEach(input => input.value = ''); // reset input values


        const addButton = newDateTimeField.querySelector('.add-datetime-btn');
        addButton.classList.replace('add-datetime-btn', 'remove-datetime-btn');
        addButton.textContent = '-';
        addButton.onclick = function () {
            removeDateTime(this);
        };

        dateTimeContainer.appendChild(newDateTimeField);
    }

    function removeDateTime(element) {
        const parent = element.closest('.datetime-group');
        if (parent) {
            parent.remove();
        }
    }

    function previewSignature(event) {
        const input = event.target;
        const preview = document.getElementById('signature-preview');
        const reader = new FileReader();
        const uploadText = document.querySelector('.e-signature-text');

        reader.onload = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
            uploadText.style.display = 'none'; // Hide the upload text
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }

    // event listener for submit
    document.querySelector('form').addEventListener('submit', function (event) {
        let datesValid = true;
        document.querySelectorAll('input[type="date"]').forEach(function (input) {
            if (!input.value) {
                datesValid = false;
            }
        });
        if (!datesValid) {
            event.preventDefault();
            alert('Please fill in all date fields.');
        }
    });


    function validateForm() {
        let isValid = true;
        let errorMessages = [];

        // Check required fields
        document.querySelectorAll('input[required], select[required]').forEach(function (element) {
            if (!element.value) {
                isValid = false;
                let errorMessage = element.previousElementSibling.textContent + " is required.";
                errorMessages.push(errorMessage);
                console.error(errorMessage);  // Log the error to the console
            }
        });

        // Check dynamic passenger fields
        const passengerSelects = document.querySelectorAll('select[name="passengers[]"]');
        const passengerValues = Array.from(passengerSelects).map(select => select.value).filter(value => value !== '');

        if (passengerValues.length === 0) {
            isValid = false;
            errorMessages.push("At least one passenger must be selected.");
            console.error("At least one passenger must be selected.");
        }

        // Check if passengers are unique
        if (new Set(passengerValues).size !== passengerValues.length) {
            isValid = false;
            errorMessages.push("Duplicate passengers are not allowed.");
            console.error("Duplicate passengers are not allowed.");
        }

        // Check date fields
        document.querySelectorAll('input[type="date"]').forEach(function (input) {
            if (!input.value) {
                isValid = false;
                let errorMessage = "All date fields must be filled.";
                errorMessages.push(errorMessage);
                console.error(errorMessage);  // Log the error to the console
            }
        });

        // Check file size
        let signatureFile = document.getElementById('RequesterSignature').files[0];
        if (signatureFile && signatureFile.size > 32000000) { // 32MB in bytes
            isValid = false;
            let errorMessage = "Signature file size must be less than 32MB.";
            errorMessages.push(errorMessage);
            console.error(errorMessage);  // Log the error to the console
        }

        if (!isValid) {
            alert("Please correct the following errors:\n\n" + errorMessages.join("\n"));
            return false;
        }
        return true;
    }


</script>
</body>
</html>
