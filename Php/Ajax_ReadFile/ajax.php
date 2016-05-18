<?php
    // Test ajax
    if (isset($_POST["value"])) {
        echo "Ok";
    }
    
    // Test ajax json
    if (isset($_POST["array"])) {
        $array = $_POST["array"];
        $encode = json_encode($array);
        echo $encode;
        echo " sum is " . array_sum(json_decode($encode));
        echo " product is " . array_product(json_decode($encode));
    }

    // Only up load a text file
    if (isset($_FILES["file"])) {
        if ($_FILES["file"]["type"] == "text/plain") {
            $path_file = "uploads/" . $_FILES["file"]["name"];
            $uploadOk = 0;
            if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
                $uploadOk = 1;
            }

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $path_file)) {
                    echo "The file " . $_FILES["file"]["name"] . " has been uploaded.";
                    createTmpfile();
                    writeLogcsv();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            return false;
        }
    }

    // Only read a text file
    if (isset($_POST["readfile"])) {
        $path_file = "uploads/" . $_POST["readfile"];
        if (file_exists($path_file)) {
            if ($_POST["type"] == "fopen") {
                $file = fopen($path_file, "r");
                $read = fread($file, filesize($path_file));
                fclose($file);
                echo "<br/>" . $read;
            } elseif ($_POST["type"] == "spl") {
                $file = new SplFileObject($path_file);
                while (!$file->eof()) {
                    echo $file->fgets();
                }
            }
        }    
    }

    // download log.csv file
    if (isset($_GET["download"])) {
        $path_file = "uploads/log.csv";
        if (file_exists($path_file)) {
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename = log.csv');
            readfile($path_file);
        }    
    }

    function createTmpfile()
    {        
        $tmpName = tempnam("uploads/", "");
        $tmpOpen = fopen($tmpName, "w");
        fwrite($tmpOpen, "The file " . $_FILES["file"]["name"] . " has been uploaded, " . date("Y-m-d H:i:s"));
        fclose($tmpOpen);
    }

    function writeLogcsv()
    {
        $fileCsv = fopen("uploads/log.csv","a");
        fwrite($fileCsv, "The file " . $_FILES["file"]["name"] . " has been uploaded, " . date("Y-m-d H:i:s") . "," . "\n");
        fclose($fileCsv);
    }