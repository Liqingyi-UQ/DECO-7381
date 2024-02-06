<!DOCTYPE html>
<html>
    <head>
        <title>Video Uploader</title>
        <?php
        // include("config.php");

        if(isset($_POST['but_upload'])){
            $maxsize = 5242880; //5MB 5242880
            $name = $_FILES['file']['name'];
            $target_dir = "upload/";
            $target_file = $target_dir . $_FILES["file"]["name"];
            echo "Server connection succeeded!<br>";

            //select file type
            $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            //valid file extension
            $extensions_arr = array("mp4","ogg","avi","3gp","mov","mpeg","mp4v","webm");

            //check extension
            if(in_array($videoFileType,$extensions_arr)){
                echo "File format check succeeded!<br>";
                
                //check file size
                if(($_FILES['file']['size']>=$maxsize) || ($_FILES['file']['size'] == 0)){
                    echo "file must be less than 500MB.";
                } else{
                    //upload
                    echo "The file size meets the requirements<br>";
                    if (file_exists("upload/" . $_FILES["file"]["name"]))
                    {
                        echo $_FILES["file"]["name"] . " the file has already existed ";

                    }
                    else
                    {
                        // if the upload file has not existed, it will created one and upload file to it
                        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                        echo "File stored at: " . "upload/" . $_FILES["file"]["name"];
                        if (file_exists("upload/" . $_FILES["file"]["name"]))
                            {
                                echo $_FILES["file"]["name"] . " file already existed。 ";
                                // insert into db
                                $mysqli = require __DIR__ . "/database.php";
                                
                                $sql = "INSERT INTO videos (name, location) VALUES (?, ?)";
                                $stmt = $mysqli->stmt_init();
                                
                                if ( ! $stmt->prepare($sql)) {
                                    echo "SQL error: " . $mysqli->error;
                                }
                                $path_of_video = "upload/" . $_FILES["file"]["name"];

                                $stmt->bind_param("ss",
                                                $_FILES["file"]["name"],
                                                $path_of_video
                                );         
                                
                                if ($stmt->execute()) {
                                    header("Location: record.php");
                                } else {
                                    die($mysqli->error . " " . $mysqli->errno);
                                }
                            } 
                            else{
                                echo "<br>Check upload success:<br>";
                                echo $_FILES["file"]["name"] . " file not exist! ";
                                echo "<br>Upload failed:<br>";
                            }  
                        
                    }
                    
                }
            }else{
                echo "Invalid file extension."; 
            }
        }


        ?>

    </head>
    <body style="padding-top:300px;margin-left:40%;">
         <form method = "post" action="" enctype ="multipart/form-data">
             <input type = 'file' name = 'file'>
             <input type = 'submit' name = "but_upload" value="Upload Video">

         </form>

    </body>
</html>