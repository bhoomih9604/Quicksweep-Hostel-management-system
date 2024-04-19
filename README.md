A website aimimg for hostel cleaning system.
<br> Author-Bhoomi Hadawale

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('C:\Users\HP\Downloads\bk.jpg');
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container input[type="text"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .container input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .flex-container {
            display: flex;
        }
        
        .flex-child {
            flex: 1;
            border: 2px solid yellow;
        }  
        
        .flex-child:first-child {
            margin-right: 20px;
        } 

    </style>
</head>
<body background="C:\Users\HP\Downloads\bk.jpg">
    <div class="form-group">
<div class="container">
    <h1> Quick Sweep</h1>
</div>
<div class="flex-container">

<div class="container flex-child ">
    <h2>Register!</h2>
    <form action="register_process.php" method="POST">
        <input type="text" name="username" id="uname" placeholder="Username" required><br>
        <input type="password" id= "upass"name="password" placeholder="Password" required><br>
        <input type="text" name="roomno" id="roomno" placeholder="Room No" ><br>
       
        <input  type="radio" name="usertype" value="wardern">Wardern
        <input type="radio" name="usertype" value="hostelite">Hostelite
        <input type="submit" value="Login">
    </form>
</div>


<div class="container flex-child">
    <h2>Login to proceed!</h2>
    <form action="login_process.php" method="POST">
        <input type="text" name="username" id="uname" placeholder="Username" required><br>
        <input type="password" id= "upass"name="password" placeholder="Password" required><br>
        <input for="wardern" type="radio" name="usertype" value="wardern">Wardern
        <input type="radio" name="usertype" value="hostelite">Hostelite
        <input type="submit" value="Login">
    </form>
</div>

</div>
</div>


