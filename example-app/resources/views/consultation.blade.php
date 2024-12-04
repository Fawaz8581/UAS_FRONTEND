<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="css/consultation.css">
    <link rel="icon" href="./images/favicon.ico">
    <title>Ponsonbys Care - Consultation</title>
</head>
<body>
    <div id="wrapper">
        <div id="left"></div>
        <div id="right">
            <h1>Consultation Appointment</h1>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form id="form" method="POST" action="{{ route('consultations.store') }}">
                @csrf
                <div>
                    <span>Full Name:</span>
                    <input
                        type="text"
                        name="name"
                        autocomplete="off"
                        placeholder="Your name"
                        id="name"
                    >
                </div>

                <div>
                    <span>Age:</span>
                    <input
                        type="number"
                        name="age"
                        autocomplete="off"
                        placeholder="25"
                        id="age"
                    >
                </div>

                <div>
                    <span>Address:</span>
                    <input
                        type="text"
                        name="address"
                        autocomplete="off"
                        placeholder="Your Address"
                        id="address"
                    >
                </div>

                <div>
                    <span>Schedule:</span>
                    <input
                        type="datetime-local"
                        name="schedule"
                        id="schedule"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Doctor</label>
                    <select class="form-control" name="doctor" required>
                        <option value="">Pilih Dokter</option>
                        <option value="Dr. Ahmad">Dr. Ahmad - Umum</option>
                        <option value="Dr. Sarah">Dr. Sarah - Spesialis Anak</option>
                        <option value="Dr. Budi">Dr. Budi - Spesialis Jantung</option>
                    </select>
                </div>

                <div>
                    <span>Symptoms:</span>
                    <input
                        type="text"
                        name="symptoms"
                        autocomplete="off"
                        placeholder="Fever, headache, etc."
                        id="symptoms"
                    >
                </div>

                <div>
                    <span>Description:</span>
                    <textarea
                        name="description"
                        id="description"
                        placeholder="Additional details about your condition..."
                        rows="4"
                    ></textarea>
                </div>

                <button type="submit" class="send-button">Send</button>
                <button type="button" class="cancel-button" onclick="redirectToHome()">Cancel</button>

            </form>
        </div>
    </div>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="js/consultation.js"></script>
</body>
</html>