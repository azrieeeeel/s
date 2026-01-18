 <?php
    downloadFile("./v69_filescheme_urlspoof.html","PoC.html");

    function downloadFile($filePath,$saveAsFileName){
        ob_end_clean();

        $fileHandle=fopen($filePath,"rb");
        if($fileHandle===false){
            echo "Can not find file: $filePath\n";
            exit;
        }

        Header("Content-type: application/octet-stream");
        Header("Content-Transfer-Encoding: binary");
        Header("Accept-Ranges: bytes");
        Header("Content-Length: ".filesize($filePath));
        Header("Content-Disposition: attachment; filename=\"$saveAsFileName\"");

        while(!feof($fileHandle)) {
            echo fread($fileHandle, 32768);
        }
        fclose($fileHandle);
    }
