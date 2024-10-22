<!-- resources/views/auth/verify_otp.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function submitForm(event) {
            event.preventDefault();
            const otp = document.getElementById('otp').value;
            axios.post('{{ route('verify.otp') }}', { otp: otp })
                .then(response => {
                    window.location.href = response.data.redirect;
                })
                .catch(error => {
                    document.getElementById('error').innerText = error.response.data.errors.otp[0];
                });
        }

        function resendOtp() {
            document.getElementById('resendButton').disabled = true;
            axios.post('{{ route('resend.otp') }}')
                .then(response => {
                    document.getElementById('message').innerText = response.data.message;
                })
                .catch(error => {
                    document.getElementById('message').innerText = 'Failed to resend OTP. Please try again.';
                })
                .finally(() => {
                    document.getElementById('resendButton').disabled = false;
                });
        }
    </script>
</head>
<body>
    <h1>Verify OTP</h1>

    <form onsubmit="submitForm(event)">
        <div>
            <label for="otp">Enter OTP</label>
            <input id="otp" name="otp" type="text" required>
        </div>

        <div>
            <button type="submit">Verify</button>
        </div>
    </form>

    <div id="error" style="color: red;"></div>

    <button id="resendButton" onclick="resendOtp()">Resend OTP</button>

    <div id="message" style="color: green;"></div>
</body>
</html>