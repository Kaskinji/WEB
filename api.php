<?php
$method = $_SERVER['REQUEST_METHOD'];
if ($method != 'POST') {
    echo "Waiting for POST parametr";
    return;
}

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

$dataAsJson = file_get_contents("php://input");
$dataAsArray = json_decode($dataAsJson, true);

// Проверяем дату-время
$publishDate = $dataAsArray['publish_date'];
if (!(is_numeric($publishDate) && (int) $publishDate == $publishDate)) {
    echo 'Ошибка при вводе даты! Вводите дату в формате UNIX TIMESTAMP';
    return;
} else {
    echo 'Дата успешно сохранена!';
}
$publishDate = date("Y-m-d", $publishDate);

//Сохраняем картинки автора и основную картинку
$author_img_ext = '';
saveImage($dataAsArray['author_image'], $dataAsArray['author_img_name'], $author_img_ext);
$main_img_ext = '';
saveImage($dataAsArray['image'], $dataAsArray['img_name'], $main_img_ext);

//title, subtitle, author, author_url, publish_date, image_url, featured, content
$info = [
    "title" => $dataAsArray['title'],
    "subtitle" => $dataAsArray['subtitle'],
    "author" => $dataAsArray['author'],
    "author_url" => 'images/' . $dataAsArray['author_img_name'] . '.' . $author_img_ext,
    "publish_date" => $publishDate,
    "image_url" => 'images/' . $dataAsArray['img_name'] . '.' . $main_img_ext,
    "featured" => $dataAsArray['featured'],
    "content" => $dataAsArray["content"],
    "tag_type" => $dataAsArray["tag_type"],
    "tag_text" => $dataAsArray["tag_text"]
];

$conn = createDBConnection();
postToDataBase($conn, $info);
closeDBConnection($conn);

function saveImage(string $imageBase64, string $imageName, string &$imgExtention): void
{
    if ($imageName == '') {
        echo 'Название изображения не должно быть пустым!';
        return;
    }

    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    saveFile("{$imageName}.{$imgExtention}", $imageDecoded);
}

function saveFile(string $file, string $data): void
{
    $myFile = fopen("images/" . $file, 'w');
    if ($myFile) {
        $result = fwrite($myFile, $data);
        if ($result) {
            echo 'Данные успешно сохранены в файл <br>';
        } else {
            echo 'Произошла ошибка при сохранении данных в файл';
        }
        fclose($myFile);
    } else {
        echo 'Произошла ошибка при открытии файла';
    }
}

function createDBConnection(): mysqli
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function closeDBConnection(mysqli $conn): void
{
    $conn->close();
}

function postToDataBase(mysqli $conn, $info): void
{
    $sql = "INSERT INTO post (title, subtitle, author, author_url, publish_date, image_url, featured, content, tag_type, tag_text) VALUES 
    ('{$info['title']}', '{$info['subtitle']}', '{$info['author']}', '{$info['author_url']}', '{$info['publish_date']}',  
    '{$info['image_url']}', {$info['featured']}, '{$info['content']}','{$info['tag_type']}', '{$info['tag_text']}')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>