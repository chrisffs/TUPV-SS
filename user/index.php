<?php 
include '../php/conn.php';
include '../php/user_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="../src/img/tupvlogo.png">
    <title>Syllabus | TUPV Syllabus System<</title>
</head>
<body class="">
    
<?php 
$page = 'syllabus';
include "../php/user_header.php";
?>
<main class="sm:ml-[64px] sm:ml-6 p-4 md:p-6 mt-[60px]">
    <div class="block space-y-2 sm:flex items-center justify-between pb-4 border-b"> 
      <div>
        <h1 class="font-semibold text-lg sm:text-2xl">Syllabus <span class="text-gray-500">></span> Subjects</h1>
      </div>
      <div>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="filter" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
        </div>
      </div>
    </div>
    
    <div id="folders" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4 md:gap-6 mt-6">
      <?php 
        $sql = "SELECT s.subjectName, s.subjCode, COUNT(u.SUBJECTS) AS file_count FROM subject_tbl s LEFT JOIN syllabus_tbl u ON s.subjectName = u.SUBJECTS GROUP BY s.subjectName ORDER BY s.subjectName ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();  
        foreach ($data as $row):  
          
        // Get the localhost path of the current file
        $localhostPath = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        $localhostDirectory = dirname($localhostPath);
      ?>
        <a href="<?php echo $localhostDirectory ."/". "syllabus/" . $row['subjCode'];?>" class="flex rounded-lg focus:ring-4 focus:ring-gray-300">
          <div class="grow bg-light-100 hover:bg-gray-200 p-4 rounded-lg flex flex-col gap-y-2">
            <div>
              <svg class="w-[24px] h-[24px] text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                <path d="M18 5H0v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5Zm-7.258-2L9.092.8a2.009 2.009 0 0 0-1.6-.8H2.049a2 2 0 0 0-2 2v1h10.693Z"/>
              </svg>
            </div>
            <div>
              <h1 class="text-sm "><?php echo $row['subjectName']; ?></h1>
            </div>
            <div class="mt-auto">
              <h2 class="text-sm text-main mb-2"><?php echo $row['subjCode']; ?></h1>
              <h4 class="text-xs"><?php echo $row['file_count'];?> <?php if($row['file_count'] == 1) {echo 'file ';} else {echo 'files ';} ?></h4>
            </div>
          </div>
        </a>
      <?php 
        // Specify the folder name and the preexisting PHP file names
        $folderName = "syllabus/" . $row['subjCode'];
        $fileNames = [__DIR__ . "/../php/preexistingfile/index.php"]; // Add more file names to this array if needed

        // Create the folder
        if (!file_exists($folderName)) {
            mkdir($folderName, 0777, true); // The third argument "true" creates nested directories if they don't exist
            // echo 'Folder created successfully.' . PHP_EOL;
        } else {
            // echo 'Folder already exists.' . PHP_EOL;
        }

        foreach ($fileNames as $fileName) {
            // Check if the preexisting file exists
            if (file_exists($fileName)) {
                // Get the source file name without the path
                $sourceFileName = basename($fileName);
                
                // Create the destination path
                $destinationPath = $folderName . '/' . $sourceFileName;
                
                // Copy the file to the new folder
                if (copy($fileName, $destinationPath)) {
                    // echo 'File copied successfully.' . PHP_EOL;
                } else {
                    // echo 'Failed to copy the file.' . PHP_EOL;
                }
            } else {
                // echo 'The preexisting file does not exist.' . PHP_EOL;
            }
            // echo $fileName;
        }
        endforeach 
      ?>
    </div>
</main>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../src/js/user_syllabus.js"></script>
</body>
</html>

<!-- Properties of Engineering Materials PEM122-V -->