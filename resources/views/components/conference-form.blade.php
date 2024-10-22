<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Room Request Form</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
        }

        .container {
            width: 60em;
            padding: 35px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin: 5em auto 3em;
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
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(60, 54, 51, 0.5);
            border-radius: 15px;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        .inline-field input[type="date"],
        .inline-field input[type="time"] {
            width: 150px;
        }

        button {
            background-color: #65558F;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            display: block;
        }

        .row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 8px;
        }

        .row-group-container {
            height: 135px;
            overflow-y: auto;
            margin-bottom: 15px;
        }

        .row-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            position: relative;
        }

        .button-container {
            display: flex;
            align-items: center;
            padding: 3px;
            margin-bottom: 8px;
        }

        .add-btn {
            display: inline-block;
            margin-left: 10px;
            background-color: #0056b3;
            color: white;
            padding: 3px 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-btn:hover {
            background-color: #003d80;
        }

        .remove-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 3px 8px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 5px;
        }

        .remove-btn:hover {
            background-color: #cc0000;
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
            text-align: center;
        }

        .inline-field {
            display: flex;
            align-items: center;

        }

        .tb {
            display: flex;
            align-items: center;

        }

        .inline-field label {
            display: inline-block;
            width: 100px;
        }

        .tb label {
            display: inline-block;
            width: 100px;
        }

        .inline-field input,
        .inline-field select {
            width: 70%;
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

        .inline-field label::after {
            content: "*";
            color: red;
            right: -15px;
            top: 0;
        }

        input[type="number"] {
            width: 40px;
            height: 25px;
            padding: 0;
            border: none;
            background-color: transparent;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            width: 25px;
            height: 25px;
            padding: 0;
            margin: 0;
            background-color: #ccc;
            cursor: pointer;
            justify-content: space-between;
            opacity: 1;
            visibility: visible;
        }

        .fac {
            display: flex;
            align-items: center;
        }

        .fac label {
            display: inline-block;
            width: 100px;
        }

        .fac input {
            width: 70%;
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                flex-direction: column;
            }

            .row {
                grid-template-columns: 1fr;
            }

            .row-multiple {
                grid-template-columns: 1fr;
            }

            .inline-field {
                flex-direction: column;
                align-items: flex-start;
            }

            .fac {
                flex-direction: column;
                align-items: flex-start;
            }

            .tb {
                flex-direction: column;
                align-items: flex-start;
            }

            .inline-field label {
                width: 100%;
                margin-bottom: 5px;
            }

            .tb label {
                width: 100%;
                margin-bottom: 15px;
            }

            .fac label {
                width: 100%;
                margin-bottom: 15px;
            }

            .inline-field input,
            .inline-field select {
                width: 100%;
            }

            .fac input {
                width: 100%;
            }

            .tb input {
                margin-left: 20px;
            }

            .add-btn {
                display: flex;
                align-items: center;
                justify-content: flex-end;
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
<div class="container">
    <h1>Request For Use of Conference Room</h1>
    <p>(Note: Request should be made at least two (2) days before the date of actual use)</p>
    <form action="/conference-room/request" method="POST" enctype="multipart/form-data"
          onsubmit="return validateForm()">
        @csrf
        <div class="row">
            <div class="inline-field">
                <label for="officeName">Requesting Office</label>
                <select id="officeName" name="officeName" required>
                    <option disabled selected>Select Office</option>
                    @foreach(App\Models\Office::all() as $office)
                        <option value="{{ $office->OfficeID }}" {{ old('officeName') == $office->OfficeID ? 'selected' : '' }}>
                            {{ $office->OfficeName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="inline-field">
                <label for="purpose">Purpose</label>
                <input type="text" id="purpose" name="purpose" placeholder="Enter Purpose" value="{{ old('purpose') }}" required>
            </div>
        </div>
        <div class="row-group-container">
            @foreach (old('date_start', [date('Y-m-d')]) as $index => $date_start)
                <div class="row-group">
                    <div class="row">
                        <div class="inline-field">
                            <label for="date_start">Date Start</label>
                            <input type="date" id="date_start" name="date_start[]" value="{{ old('date_start.' . $index) }}" required>
                        </div>
                        <div class="inline-field">
                            <label for="date_end">Date End</label>
                            <input type="date" id="date_end" name="date_end[]" value="{{ old('date_end.' . $index) }}" required>
                            <div class="button-container">
                                <button class="add-btn" type="button" onclick="handleFormActions('addRow')">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="inline-field">
                            <label for="time_start">Time Start</label>
                            <input type="time" id="time_start" name="time_start[]" value="{{ old('time_start.' . $index) }}" required>
                        </div>
                        <div class="inline-field">
                            <label for="time_end">Time End</label>
                            <input type="time" id="time_end" name="time_end[]" value="{{ old('time_end.' . $index) }}" required>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="inline-field">
                <label for="conferenceRoom">Select Conference Room</label>
                <select id="conferenceRoom" name="conferenceRoom" required>
                    <option disabled selected>Select Room</option>
                    @foreach(App\Models\ConferenceRoom::all() as $room)
                        <option value="{{ $room->CRoomID }}" {{ old('conferenceRoom') == $room->CRoomID ? 'selected' : '' }}>
                            {{ $room->CRoomName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="inline-field">
                <label for="focalPerson">Focal Person</label>
                <input type="text" id="focalPerson" name="focalPerson" placeholder="Enter Focal Person" value="{{ old('purpose') }}" required>
            </div>
        </div>
        <div class="row">
            <div class="tb">
                <label for="persons">No. of Persons</label>
                <input type="number" id="npersons" name="npersons" min="0" value="{{ old('npersons', 0) }}" step="1">
                <div class="tb">
                    <label for="tables">Tables</label>
                    <input type="number" id="tables" name="tables" min="0" value="{{ old('tables', 0) }}" step="1">
                    <div class="tb">
                        <label for="chairs">Chairs</label>
                        <input type="number" id="chairs" name="chairs" min="0" value="{{ old('chairs', 0) }}" step="1">
                    </div>
                </div>
            </div>
            <div class="fac">
                <label for="otherFacilities">Other Facilities</label>
                <input type="text" id="otherFacilities" name="otherFacilities" placeholder="Specify Others" value="{{ old('otherFacilities') }}">
            </div>
        </div>
        <div class="row">
            <div class="inline-field">
                <label for="requesterName">Requester Name</label>
                <input type="text" id="requesterName" name="requesterName" placeholder="Enter Name of Requester" value="{{ old('requesterName') }}" required>
            </div>
            <div class="inline-field">
                <label for="RequesterSignature">E-Signature</label>
                <div class="file-upload">
                    <input type="file" id="RequesterSignature" name="RequesterSignature" style="display: none;"
                           onchange="handleFormActions('previewSignature')" required>
                    <div class="e-signature-text" onclick="document.getElementById('RequesterSignature').click();">
                        Click to upload e-sign.<br>Maximum file size: 32MB
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
<script>
    /**
     * Handles various form actions such as adding or removing rows and previewing the signature.
     *
     * @param {string} action - The action to be performed ('addRow', 'removeRow', 'previewSignature').
     * @param {Event} event - The event object associated with the action.
     */
    function handleFormActions(action, event) {
        switch (action) {
            case 'addRow':
                let rowGroupContainer = document.querySelector('.row-group-container');
                let newRowGroup = document.createElement('div');
                newRowGroup.className = 'row-group';
                let today = new Date().toISOString().slice(0, 10);
                newRowGroup.innerHTML = `
                <div class="row">
                    <div class="inline-field">
                        <label for="date_start">Date Start</label>
                        <input type="date" id="date_start" name="date_start[]" required>
                    </div>
                    <div class="inline-field">
                        <label for="date_end">Date End</label>
                        <input type="date" id="date_end" name="date_end[]" required>
                        <div class="remove-container">
                            <button class="remove-btn" onclick="handleFormActions('removeRow')">-</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="inline-field">
                        <label for="time_start">Time Start</label>
                        <input type="time" id="time_start" name="time_start[]" required>
                    </div>
                    <div class="inline-field">
                        <label for="time_end">Time End</label>
                        <input type="time" id="time_end" name="time_end[]" required>
                    </div>
                </div>
            `;
                rowGroupContainer.appendChild(newRowGroup);
                break;
            case 'removeRow':
                event.target.closest('.row-group').remove();
                break;
            case 'previewSignature':
                const input = event.target;
                const preview = document.getElementById('signature-preview');
                const reader = new FileReader();
                const uploadText = document.querySelector('.e-signature-text');
                reader.onload = function () {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                    uploadText.style.display = 'none';
                };
                if (input.files && input.files[0]) {
                    reader.readAsDataURL(input.files[0]);
                }
                break;
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

    /**
     * Validates the conference room request form.
     *
     * This function checks for the presence of required fields, ensures all date fields are filled,
     * and verifies that the uploaded signature file does not exceed the maximum allowed size of 32MB.
     * If any validation fails, it displays an alert with the corresponding error messages.
     *
     * @returns {boolean} True if the form is valid, false otherwise.
     */
    function validateForm() {
        let isValid = true;
        let errorMessages = [];

        // Check required fields
        document.querySelectorAll('input[required], select[required]').forEach(function (element) {
            if (!element.value) {
                isValid = false;
                errorMessages.push(element.previousElementSibling.textContent + " is required.");
            }
        });

        // Check date fields
        document.querySelectorAll('input[type="date"]').forEach(function (input) {
            if (!input.value) {
                isValid = false;
                errorMessages.push("All date fields must be filled.");
            }
        });

        // Check file size
        let signatureFile = document.getElementById('RequesterSignature').files[0];
        if (signatureFile && signatureFile.size > 32000000) { // 32MB in bytes
            isValid = false;
            errorMessages.push("Signature file size must be less than 32MB.");
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
