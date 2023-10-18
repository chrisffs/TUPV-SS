<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="icon" href="src/img/tupvlogo.png">
    <?php 
    include 'php/fonts.php';
    session_start();
    ?>
    <title>Login | TUPV Syllabus System</title>
</head>
<body class=""> 
    <div class="h-screen flex items-center justify-center">
        <div class="p-8"> 
        <!-- bg-light border border-light-200 rounded-lg  -->
            <div class="flex items-center">
                <div class="w-1/2 py-6 px-16 border-light-200">
                <!-- border-r-2  -->
                    <div class="mb-10">
                        <img src="src/img/user-landingpage-pic.png" class="object-cover h-auto max-w-full w-[650px]" alt="">
                    </div>
                    <div class="text-center">
                        <h1 class="text-2xl">Dont have an account yet?</h1>
                        <h4>Contact the admin via email at <span class="block text-main font-bold">admin@example.com</span></h4>
                    </div>
                </div>
                <div class="w-1/2 p-6 px-16">
                    <div class="">
                        <div class="flex justify-center items-center mb-10">
                            <div class="me-2 w-[50px]">
                                <img src="src/img/tupvlogo.png" class="object-cover" alt="" srcset="">
                            </div>
                            <div class="me-2 w-[80px]">
                                <img src="src/img/sslogo.png" class="object-cover" alt="" srcset="">
                            </div>
                        </div>
                        <div class="mb-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-secondary md:text-2xl dark:text-white">User Login</h1>
                            <!-- <h3 class="text-sm text-secondary">Log in with your admin cridentials</h3> -->
                        </div>
                        <div>
                            <form id="login-form" action="php/user_login.php" method="post">
                                <div class="mb-2.5">
                                    <label for="username" class="block mb-2 text-sm text-secondary">Username</label>
                                    <input type="text" id="username" class="bg-gray-50 border border-light-200 text-dark text-sm rounded-lg block w-full p-2.5 focus:outline-0 focus:ring-2 focus:ring-blue placeholder-gray-400" name="tupv_id" placeholder="TUPV-23-1234" required>
                                </div>
                                <div class="mb-6">
                                    <label for="password" class="block mb-2 text-sm text-secondary ">Password</label>
                                    <input type="password" id="password" class="bg-gray-50 border border-light-200 text-dark text-sm rounded-lg block w-full p-2.5 focus:outline-0 focus:ring-2 focus:ring-blue placeholder-gray-400" placeholder="••••••••" name="password" required>
                                    <h6 class="text-xs text-main italic mt-1.5">
                                        <?php 
                                        if(isset($_SESSION['invalid'])){
                                            $invalid = $_SESSION['invalid'];
                                            echo $invalid;
                                        }
                                        unset($_SESSION['invalid']);
                                        ?>
                                    </h6>
                                </div>
                                <div>
                                    <button type="submit" value="login" name="login" class="text-light bg-main py-2 w-full rounded-[0.5rem] text-sm hover:drop-shadow-lg focus:ring-4 focus:outline-none focus:ring-[#E7A6B1]">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h4 class="text-xs">Powered by College of Engineering Technology</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>