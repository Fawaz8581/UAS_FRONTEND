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
                        id="fullname"
                    >
                </div>

                <div>
                    <span>E-mail:</span>
                    <input
                        type="mail"
                        autocomplete="off"
                        placeholder="jdoe@mail.com"
                        id="email"
                    >
                </div>

                <div>
                    <span>Check In</span>
                    <input
                        type="date"
                        id="check-in"
                    >
                </div>

                <div>
                    <span>Room Size:</span>
                    <div id="room-selector">
                        <label
                            for="1"
                            title="2 person"
                            class="grow-selector"
                        >
                            Couple
                        </label>
                        <input
                            type="radio"
                            name="room"
                            id="1"
                            checked
                        >

                        <label
                            for="2"
                            title="3 to 5 persons"
                        >
                            Family
                        </label>
                        <input
                            type="radio"
                            name="room"
                            id="2"
                        >

                        <label
                            for="3"
                            title="5+ persons"
                        >
                            Friends
                        </label>
                        <input
                            type="radio"
                            name="room"
                            id="3"
                        >
                    </div>
                </div>

                <button class="send-button">Send</button>
            </form>
        </div>
    </div>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="js/consultation.js"></script>
</body>
</html>