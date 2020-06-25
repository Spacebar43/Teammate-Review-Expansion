<?php
    
   // for reference: https://stackoverflow.com/questions/11315951/using-the-browser-prompt-to-download-a-file/11316004#11316004?newreg=7ce52131dbdf42959a537e20e696c483

    function dl_file($file) {
        // this sets up the dl
        header('content-Description: File Transfer');
        header('Content-Type: text/csv; charset=utf-8');
        //header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Content-Disposition: attachment; filename="'.$file.'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        //header('Content-Length: '.filesize($file));
        ob_clean();
        flush();
        print "data here\n";
        print "another line?\n";
        $a1 = array('a', 'b', 'c');
        $a2 = array('1', '2', '3');
        $a3 = array('name','rain','la');
        $aa = array($a1, $a2, $a3);
        $feed = fopen("php://output",'w');
        fputcsv($feed, $aa[0]);
        fputcsv($feed, $aa[1]);
        fputcsv($feed, $aa[2]);
        //readfile($file);
        exit;
    }

    dl_file('file.name');
?>   
