<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    
    use Shuchkin\SimpleXLSX;

    include_once("simplexlsx/src/SimpleXLSX.php");

    function obtenerValores($ruta)
    {
        if ($xlsx = SimpleXLSX::parse($ruta)) {
            print_r($xlsx->rows());
        } else {
            echo SimpleXLSX::parseError();
        }

        return true;
    }

    function deleteFiles()
    {
        $folder_path = "uploads";

        $files = glob($folder_path.'/*');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        return true;
    }

    if (isset($_POST['submit'])) {
        deleteFiles();

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an image
        /*
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        */

        // Check if file already exists
        /*
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        */

        // Check file size
        /*
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        */

        // Allow certain file formats
        if ($imageFileType != "xlsx") {
            echo "Disculpa, solo son permitidos archivos con formato xlsx.";
            $uploadOk = 0;
        }

        // Check
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";

                $valor = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
                obtenerValores($target_dir . $valor);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    ?>

        <form action="index2.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    
</body>
</html>