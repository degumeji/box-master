
<style>
    .cont {
        width: 24%;
    }
    .txtArea{
        width: 324% !important;
        height: 10% !important;
    }
    .btn {
        width: 76%;
    }
    .tabla{
        width: 60%; 
        margin-top: 0%;
        margin-left: 2%;
    }
    .button {
        margin-top: 1%;
    }
    .h1Central{
        text-align: center;
    }
    textarea {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

        width: 100%;
        height: 60%;
        resize: none;
    }
    @media only screen and (max-width: 600px) {
        .cont {width: 100%;}
        .txtArea{
            width: 100% !important;
            height: 6% !important;
        }
        .final {
            margin-bottom: 0%;
        }
        .espacioFinal{
            margin-bottom: 28%;
        }
        .tabla{
            width: 100%; 
            margin-top: 0%;
            margin-left: 0%;
        }
        .button {
            margin-top: 1%;
        }
        .h1Central{
            text-align: center;
            margin-left: 0%;
        }
    }
</style>

<div class="col-sm-6 col-md-12 tabla">

    <!-form class="form"-->

        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <h1 class="h1Central">Entrenamiento</h1>
                </div>

            </div>
            
            <br>

            <div class="row">

                <div class="col-md-4">
                    <!--label class="form-label" for="txtDia">Día:</label>
                    <input type="date" id="txtDia" class="form-control" value="<?php //echo date('Y-m-d')?>"/-->

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

                            $target_dir = dirname(__FILE__)."/uploads/";
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
                                echo $_FILES["fileToUpload"]["tmp_name"];
                                echo "<br>";
                                echo $target_file;
                                die();
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
                    
                    <!--form action="../entrenamientos.php" method="post" enctype="multipart/form-data"-->
                    <form action="entrenamientos.php" method="post" enctype="multipart/form-data" class="form">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>

                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-12">
                    <!--textarea name="txtProgramacion" id="txtProgramacion"></textarea-->
                </div>
                
            </div>

            <br>

            <div class="row">

                <div class="col-md-12">
                    <!--input type="button" class="btn btn-primary btn-block button" value="Guardar"-->
                </div>
                
            </div>

        </div>
        
    <!--/form-->
</div>