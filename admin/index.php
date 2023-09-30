<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <?php 
    include '../php/fonts.php';
    session_start();
    ?>
    <title>Admin Login | TUPV Syllabus System</title>
</head>
<body class="bg-light-100">
    <div class="absolute w-full">
        <img src="../src/img/admin_bg.png" class="w-full z-0" srcset="">
    </div>
    <main class="z-99 relative flex justify-center mb-8 mx-4">
        <div class="mt-[10%] bg-light w-[31rem] p-12 rounded-[0.5rem] border border-light-200 shadow">
            <div class="flex justify-center items-center mb-10">
                <div class="me-2 w-[50px]">
                    <img src="../src/img/tupvlogo.png" class="object-cover" alt="" srcset="">
                </div>
                <div class="me-2 w-[80px]">
                    <img src="../src/img/sslogo.png" class="object-cover" alt="" srcset="">
                </div>
                <div class="w-[80px]">
                    <h1 class="text-main font-medium">ADMIN</h1>
                </div>
            </div>
            <div class="mb-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-secondary md:text-2xl dark:text-white">Admin Login</h1>
                <h3 class="text-sm text-secondary">Log in with your admin cridentials</h3>
            </div>
            <div>
                <form id="login-form" action="../php/admin_login.php" method="post">
                    <div class="mb-2.5">
                        <label for="username" class="block mb-2 text-sm text-secondary">Username</label>
                        <input type="text" id="username" class="bg-gray-50 border border-light-200 text-dark text-sm rounded-lg block w-full p-2.5 focus:outline-0 focus:ring-2 focus:ring-blue placeholder-gray-400" name="tupv_id" placeholder="name@company.com" required>
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
        
    </main>
    <div>
        <h2 class="text-secondary text-sm font-normal text-center">Technological University of the Philippines - Visayas <br> All Rights Reserved 2023</h2>
    </div>
</body>
</html>