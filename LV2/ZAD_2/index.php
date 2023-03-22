<html>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="txFile" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
    <div>
        <ul>
            <?php
                $files = array_diff(scandir('./uploads'), array('..', '.'));
                foreach ($files as $file)
                {
                    echo <<<FILE
                    <li><a href="download.php?fileName=$file"><span>$file</span></a></li>
                    FILE;
                }
            ?>
        </ul>
    </div>
</body>
</html>


