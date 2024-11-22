<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Laravel MongoDB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .status {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .status.success {
            color: green;
        }

        .status.error {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>
    
    <form id="registerForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Register</button>
    </form>

    <!-- Status pesan berdasarkan hasil submit -->
    <div class="status" id="statusMessage"></div>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Ambil data input
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Kirim data ke server menggunakan fetch
        fetch('http://localhost:8000/api/users', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                name: name,
                email: email,
                password: password,
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === "User created successfully") {
                document.getElementById('statusMessage').textContent = data.message;
                document.getElementById('statusMessage').className = "status success";
            } else {
                document.getElementById('statusMessage').textContent = "Error: " + data.message;
                document.getElementById('statusMessage').className = "status error";
            }
        })
        .catch(error => {
            document.getElementById('statusMessage').textContent = "Error: " + error;
            document.getElementById('statusMessage').className = "status error";
        });
    });
</script>

</body>
</html>
