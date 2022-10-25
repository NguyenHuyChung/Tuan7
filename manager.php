<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<?php

error_reporting(E_ERROR | E_PARSE);

class Student{
    public $name;
    public $gender;
    public $faculty;
    public $dob;
    public $address;
    public $picture;
}

$faculties = array(
    "MAT" => "Khoa học máy tính",
    "KDL" => "Khoa học vật liệu"
);

$student1 = new Student();
$student1->name = 'Nguyễn Văn A';
$student1->faculty = 'MAT';

$student2 = new Student();
$student2->name = 'Trần Thị B';
$student2->faculty = 'MAT';

$student3 = new Student();
$student3->name = 'Nguyễn Hoàng C';
$student3->faculty = 'KDL';

$student4 = new Student();
$student4->name = 'Đinh Quang D';
$student4->faculty = 'KDL';

$students = array($student1, $student2, $student3, $student4);

function console_log($data)
{
    $output = json_encode($data);

    echo "<script>console.log('{$output}' );</script>";
}

?>

<body>
<div class="body">
    <div>
        <form method="post">
            <div class="flex-start">
                <div class="filter-label">
                    Khoa
                </div>
                <select name="faculty">
                    <option value=""></option>
                    <?php
                    foreach ($faculties as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="flex-start">
                <div class="filter-label">
                    Từ khóa
                </div>
                <div>
                    <input id="keywords" name="keywords" type='text' />
                </div>
            </div>

            <div class="center mt-25">
                <input class="btn" type='submit' name="confirm" value="Tìm kiếm">
            </div>
        </form>
    </div>
    <div class="w-65 mt-25 flex-space-between">
        <?php
        echo "Số sinh viên tìm thấy: " . count($students);
        ?>
        <div>
            <a class="btn mr-20" href="index.php"> Thêm </a>
        </div>
    </div>
    <div class="w-75 mt-25">
        <table class="w-100">
            <tr>
                <th>No</th>
                <th>Tên sinh viên</th>
                <th>Khoa</th>
                <th>Action</th>
            </tr>

            <?php
            for ($i = 0; $i < count($students); $i++) {
                $student = $students[$i];
                $index = $i + 1;
                $faculty = $faculties[$student->faculty];

                echo "<tr>
                            <td>$index</td>
                            <td>$student->name</td>
                            <td>$faculty</td>
                            <td>
                                <input class='table-btn' type='button' value='Xóa'>
                                <input class='table-btn' type='button' value='Sửa'>
                            </td>
                        </tr>";
            }
            ?>
        </table>
    </div>

</div>
</body>

</html>