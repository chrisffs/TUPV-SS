<?php
// Your existing code for database connection
include "conn.php";
// Retrieve the subject data
$sql = "SELECT * FROM subject_tbl";
$stmt = $conn->prepare($sql);
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<label for="subject" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
<select id="subject" name="subject" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    <option selected disabled hidden value="">Choose the Subject</option>
    <?php foreach ($subjects as $row): ?>
        <option value="<?php echo $row['subjectName']; ?>"><?php echo $row['subjectName']; ?></option>
    <?php endforeach; ?>
</select>   

<label for="subjectCode" class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Subject Code</label>
<select id="subjectCode" disabled name="subjectCode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    <option selected disabled hidden value="">Select a Subject first</option>
</select>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
</script>







