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

            <form id="form">
                <div>
                    <span>Full Name:</span>
                    <input
                        type="text"
                        autocomplete="off"
                        placeholder="John Doe"
                        id="name"
                    >
                </div>

                <div>
                    <span>Age:</span>
                    <input
                        type="number"
                        autocomplete="off"
                        placeholder="25"
                        id="age"
                    >
                </div>

                <div>
                    <span>Address:</span>
                    <input
                        type="text"
                        autocomplete="off"
                        placeholder="123 Main Street"
                        id="address"
                    >
                </div>

                <div>
                    <span>Schedule:</span>
                    <input
                        type="datetime-local"
                        id="schedule"
                    >
                </div>

                <div>
                    <span>Doctor:</span>
                    <select id="doctor">
                        <option value="">Select a doctor</option>
                        <option value="Dr. Smith">Dr. Smith</option>
                        <option value="Dr. Johnson">Dr. Johnson</option>
                        <option value="Dr. Williams">Dr. Williams</option>
                    </select>
                </div>

                <div>
                    <span>Symptoms:</span>
                    <input
                        type="text"
                        autocomplete="off"
                        placeholder="Fever, headache, etc."
                        id="symptoms"
                    >
                </div>

                <div>
                    <span>Description:</span>
                    <textarea
                        id="description"
                        placeholder="Additional details about your condition..."
                        rows="4"
                    ></textarea>
                </div>

                <button class="send-button">Send</button>
            </form>
        </div>
    </div>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="js/consultation.js"></script>
</body>
</html>