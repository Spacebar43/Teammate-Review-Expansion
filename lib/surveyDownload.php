<?php

    // TODO

    function get_norm_scores() {
        // todo
    }

    function dl_norm_scores( $array ) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=normalized_surveys.csv');
        // start a new output buffer
        ob_clean();
        flush();
        $dl = fopen('php://output', 'w');
        // iterate through each member of array for contained array
        foreach ($array as $val) {
            fputcsv($dl, $val);
        }
        fclose($dl);
        exit;
    }

?>
