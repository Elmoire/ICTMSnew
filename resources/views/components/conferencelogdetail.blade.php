<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Room Request Form</title>
    <style>
        body {
            font-family: 'Poppins';
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
            margin-top: 15px;
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
            height: 200px; /* Adjust height as necessary */
            overflow-y: auto;
            overflow-x: hidden;
            margin-bottom: -40px;
            margin-right: 10px;
        }

        .row-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
            position: relative;
        }

        .remove-container {
            position: absolute;
            top: 0;
            right: 0;
        }

        .button-container {
            display: flex;
            align-items: center;
            padding: 3px;
            margin-bottom: 8px;
        }

        .add-btn {
            background-color: #0056b3;
            color: white;
            padding: 3px 8px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 20px;
            margin-left: 5px;
        }

        .add-btn:hover {
            background-color: #003d80;
        }

        .remove-btn {
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 20px;
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
            margin-bottom: 15px;
            margin-left: 20px;
        }

        .tb {
            display: flex;
            align-items: center;

        }

        .inline-field label {
            display: inline-block;
            width: 120px;
            margin-right: 10px;
        }

        .inline-field input,
        .inline-field select {
            width: 70%;
        }

        .tb label {
            display: inline-block;
            width: 100px;
        }

        .form-footer {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 20px;
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

        .cancel-btn {
            background-color: #ff4d4d;
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

        @media (max-width: 768px) {
            .container {
                width: 90%;
                flex-direction: column;
            }

            .row {
                grid-template-columns: 1fr;
            }

            .row-group-container {
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 20px;
                max-height: 200px;
            }

            .row-group-container label {
                width: 100%;
                margin-bottom: 5px;
            }

            .row-group-container input[type="date"],
            .row-group-container input[type="time"] {
                width: 50%;
            }

            .inline-field {
                flex-direction: column;
                align-items: flex-start;
            }

            .inline-field label[for="person"] {
                margin-right: -150px; /* adjust the value as needed */
            }

            .tb {
                flex-direction: column;
                align-items: flex-start;
            }

            .tb input {
                margin-right: -150px;
            }

            .inline-field label {
                width: 100%;
                margin-bottom: 5px;
            }

            .tb label {
                width: 100%;
                margin-bottom: 15px;
            }

            .inline-field input,
            .inline-field select {
                width: 100%;
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

<div class="container">
    <h1>View Details of Request for Conference Room</h1>
    <p>(Note: Request should be made at least two (2) days before the date of actual use)</p>

    <form method="POST" action="" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="CRequestID" value="{{ $requestLogData-> CRequestID }}">
        <div class="row">
            <div class="inline-field">
                <label for="officeName">Requesting Office</label>
                <input type="text" id="officeName" name="officeName" value="{{ $requestLogData->office->OfficeName }}" placeholder="-" readonly>
            </div>
            <div class="inline-field ">
                <label for="purpose">Purpose</label>
                <input type="text" id="purpose" name="purpose" value="{{ $requestLogData->Purpose }}" placeholder="-"
                       readonly>
            </div>
        </div>
        <div class="row-group-container">
            <div class="row-group">
                <div class="row">
                    <div class="inline-field">
                        <label for="dateStart">Date Start</label>
                        <input type="date" id="dateStart" name="dateStart" value="{{ $requestLogData->date_start }}"
                               readonly>
                    </div>
                    <div class="inline-field">
                        <label for="dateEnd">Date End</label>
                        <input type="date" id="dateEnd" name="dateEnd" value="{{ $requestLogData->date_end }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="inline-field">
                        <label for="timeStart">Time Start</label>
                        <input type="time" id="timeStart" name="timeStart" value="{{ $requestLogData->time_start }}"
                               readonly>
                    </div>
                    <div class="inline-field">
                        <label for="timeEnd">Time End</label>
                        <input type="time" id="timeEnd" name="timeEnd" value="{{ $requestLogData->time_end }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="inline-field">
                <label for="conferenceRoom">Conference Room</label>
                <input type="text" id="conferenceRoom" name="conferenceRoom" value="{{ $requestLogData->conferenceRoom->CRoomName }}" placeholder="-" readonly>
            </div>
            <div class="inline-field">
                <label for="focalPerson">Focal Person</label>
                <input type="text" id="focalPerson" name="focalPerson" value="{{ $requestLogData->focalPerson }}" placeholder="Enter Focal Person" readonly>
            </div>
            <div class="row">
            </div>
        </div>
        <div class="row">
            <div class="inline-field">
                <label for="person">No. of Persons</label>
                <input type="number" id="npersons" name="npersons" value="{{ $requestLogData->npersons }}" placeholder="0"
                       readonly>
                <div class="tb">
                    <label for="tables">Tables</label>
                    <input type="number" id="tables" name="tables" value="{{ $requestLogData->tables }}" placeholder="0" readonly>
                    <div class="tb">
                        <label for="chairs">Chairs</label>
                        <input type="number" id="chairs" name="chairs" value="{{ $requestLogData->chairs }}" placeholder="0" readonly>
                    </div>
                </div>
            </div>
            <div class="inline-field">
                <label for="otherFacilities">Other Facilities</label>
                <input type="text" id="otherFacilities" name="otherFacilities" value="{{ $requestLogData->otherFacilities }}" placeholder="-" readonly>
            </div>
        </div>

        <div class="row">
            <div class="inline-field">
                <label for="requesterName">Requester Name</label>
                <input type="text" id="requesterName" name="requesterName" value="{{ $requestLogData->RequesterName }}" placeholder="-" readonly   >
            </div>
            <div class="inline-field">
                <label for="RequesterSignature">E-Signature</label>
                <div class="file-upload">
                    <img id="signature-preview"
                         src="{{ $requestLogData->RequesterSignature ? asset('storage/' . $requestLogData->RequesterSignature) : '' }}"
                         alt="Signature Preview"
                         style="{{ $requestLogData->RequesterSignature ? 'display: block;' : 'display: none;' }}" readonly>
                </div>
            </div>
            <div class="inline-field">
                <label for="availability">Availability</label>
                <input type="text" id="availability" name="availability" value="{{ $requestLogData->conferenceRoom->Availability }}" placeholder="-" readonly>
            </div>
            <div class="inline-field">
                <label for="FormStatus">Form Status</label>
                <input type="text" id="FormStatus" name="FormStatus" value="{{ $requestLogData->FormStatus }}" placeholder="-" readonly>
            </div>
        </div>
        <div class="row">
            <div class="inline-field">
                <label for="EventStatus">Event Status</label>
                <input type="text" id="EventStatus" name="EventStatus" value="{{ $requestLogData->EventStatus }}" placeholder="-" readonly>
            </div>
        </div>
        <div class="form-footer">
            <button class="cancel-btn" type="button" onclick="cancelForm()">Back</button>
        </div>
    </form>
</div>
<script>
    function cancelForm() {
        window.location.href = '/Logs';
    }

    // Attach the cancelForm function to the cancel button
    document.querySelector('.cancel-btn').addEventListener('click', cancelForm);

    function previewSignature(event) {
        const input = event.target;
        const preview = document.getElementById('signature-preview');
        const reader = new FileReader();
        const uploadText = document.querySelector('.e-signature-text');

        reader.onload = function() {
            preview.src = reader.result;
            preview.style.display = 'block';
            uploadText.style.display = 'none'; // Hide the upload text
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>
