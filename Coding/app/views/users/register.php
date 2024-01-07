<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YouthVenture's Register</title>
    <link rel="icon" type="image/x-icon"
        href="https://media.licdn.com/dms/image/C4E0BAQF2uYlKl-qeWQ/company-logo_200_200/0/1622008554055?e=1707350400&v=beta&t=ljEkj7YeEBqF_4AKIpuJPg5OSeibHO_Vgj6ubG1Z2fw">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed" rel="stylesheet" type="text/css" />

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            color: white;
            background-image: url("photo/background.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-box {
            background: linear-gradient(#7C1C2B, #9c485d);
            width: 100%;
            max-width: 600px;
            border-radius: 5%;
            box-shadow: 0px -5px 10px 0px rgba(0, 0, 0, 0.235);
            padding: 20px;
            box-sizing: border-box;
            position: relative;
            z-index: 1;
            margin-bottom: 30px;
        }

        h2 {
            text-align: center;
            font-style: bold;
            font-weight: 900;
            color: white;
            font-size: 20px;
            padding-bottom: 15px;
            padding-top: 10px;
        }

        .table-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .table {
            width: 48%;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .user-box {
            margin-bottom: 15px;
        }

        label {
            font-size: 12px;
            margin-bottom: 5px;
            display: block;
            transition: color 0.3s;
        }

        .input {
            background-color: rgba(0, 0, 0, 0);
            border: none;
            border-bottom: 1px solid #ffffff;
            outline: none;
            color: white;
            width: 100%;
            font-size: 15px;
            height: 30px;
            box-sizing: border-box;
            font-size: 15px;
            transition: 0.2s ease-in;
        }

        .input:focus {
            border-bottom: 1px solid #FCBD32;
        }

        .input:focus~label {
            color: #FCBD32;
        }

        .radio-group {
            display: flex;
            margin-bottom: 15px;
            justify-content: space-around;
        }

        .radio-input {
            display: none;
        }

        .input:valid~label,
        .input:focus~label {
            font-size: 12px;
            color: #FCBD32;
            transform: translateY(-10px);
            width: 50px;
        }

        .radio-label {
            flex: 1;
            cursor: pointer;
            padding: 5px;
            transition: background-color 0.3s, color 0.3s;
            text-align: center;
        }

        .radio-input:checked+.radio-label {
            color: #f9dc9d;
        }

        .submit {
            color: white;
            text-decoration: none;
            font-size: 14px;
            letter-spacing: 3px;
            text-align: center;
            border-radius: 5px;
            transition: 0.3s;
            margin-top: 20px;
            padding: 5px 10px;
            display: inline-block;
            background-color: #7C1C2B; /* Change the button color */
        }

        .submit:hover {
            background-color: #9c485d; /* Change the hover color */
            box-shadow: 0 0 10px whitesmoke;
        }

        .logo {
            width: 70%;
            max-width: 200px;
            margin-bottom: 10px;
            position: relative;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
        }

        ::placeholder {
            font-size: 12px;
            font-style: italic;
        }

        a {
            color: white;
            text-decoration: none;
            font-size: 12px;
            letter-spacing: 2px;
            text-align: center;
            border-radius: 5px;
            transition: 0.3s;
            margin-top: 10px;
            padding: 10px 20px;
            display: block;
            margin-top: auto;
        }

        .error-message {
            font-size: 12px;
            color: #FF0000;
            margin-top: 5px;
        }

        @media only screen and (max-width: 600px) {
            .table {
                width: 100%;
            }

            body {
                overflow: auto; /* Allow scrolling for mobile users */
            }
        
            a {
                left: 0;
                right: auto; /* Reset right position */
            }
          }
        
    </style>
</head>

<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="login-box">
            <img src="https://www.youthventures.asia/content/images/2022/12/06D439C5-6E12-447F-87BB-77750DB927BE.png"
                class="logo" />
            <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                <div class="table-container">
                    <div class="table">
                        <div class="user-box">
                            <label for="role">I am:</label>
                            <div class="radio-group">
                                <input class="radio-input" type="radio" name="role" value="Lecturer" id="lecturer">
                                <label for="lecturer" class="radio-label">Lecturer</label>
                                <input class="radio-input" type="radio" name="role" value="Student" id="student">
                                <label for="student" class="radio-label">Student</label>
                            </div>
                        </div>

                        <div class="user-box">
                            <label for="fullName">Full Name:</label>
                            <input class="input" type="text" id="fullName" name="fullName"
                                placeholder="Enter your full name" required="required" />
                            <span class="error-message"><?php echo $data['fullNameError']; ?></span>
                        </div>

                        <div class="user-box">
                            <label for="gender">Gender:</label>
                            <div class="radio-group">
                                <input class="radio-input" type="radio" name="gender" value="M" id="male">
                                <label for="male" class="radio-label">Male</label>
                                <input class="radio-input" type="radio" name="gender" value="F" id="female">
                                <label for="female" class="radio-label">Female</label>
                                <input class="radio-input" type="radio" name="gender" value="O" id="others">
                                <label for="others" class="radio-label">Others</label>
                            </div>
                        </div>

                        <div class="user-box">
                            <label for="icNo">IC Number: (With -)</label>
                            <input class="input" type="text" id="icNo" name="icNo"
                                placeholder="Enter your IC number" required="required" />
                            <span class="error-message"><?php echo $data['icNoError']; ?></span>
                        </div>

                        <div class="user-box">
                            <label for="username">Username:</label>
                            <input class="input" type="username" id="username" name="username"
                                placeholder="Enter your username" required="required" />
                            <span class="error-message"><?php echo $data['usernameError']; ?></span>
                        </div>

                        <div class="user-box">
                            <label for="password">Password:</label>
                            <input class="input" type="password" id="password" name="password"
                                placeholder="Enter your password" required="required" />
                            <span class="error-message"><?php echo $data['passwordError']; ?></span>
                        </div>

                        <div class="user-box">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input class="input" type="password" name="confirmPassword" id="confirmPassword" value="">
                            <span class="error-message"><?php echo $data['confirmPasswordError']; ?></span>
                        </div>
                    </div>

                    <div class="table">
                        <div class="user-box">
                            <label for="address">City, State:</label>
                            <input class="input" type="text" id="address" name="address"
                                placeholder="Enter your city and state" required="required" />
                        </div>

                        <div class="user-box">
                            <label for="university">University:</label>
                            <input class="input" type="text" id="university" name="university"
                                placeholder="Enter your university" required="required" />
                        </div>

                        <div class="user-box">
                            <label for="email">Email:</label>
                            <input class="input" type="email" id="email" name="email" placeholder="Enter your email"
                                required="required" />
                            <span class="error-message"><?php echo $data['emailError']; ?></span>
                        </div>

                        <div class="user-box">
                            <label for="race">Race:</label>
                            <input class="input" type="text" id="race" name="race" placeholder="Enter your race"
                                required="required" />
                        </div>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-top: 20px;">
                    <button type="submit" class="submit">
                        SUBMIT
                    </button>
                    <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-secondary">Back to Login?</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
