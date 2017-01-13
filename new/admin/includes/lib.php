<?php
function trace($msg)
{

?>
<script>
alert("<?php echo $msg; ?>");
</script>
<?php

}
function openFile($file, $mode, $input) {
    if ($mode == "READ") {
        if (file_exists($file)) {
            $handle = fopen($file, "r");
            $output = fread($handle, filesize($file));
            return $output; // output file text
        } else {
            return false; // failed.
        }
    } elseif ($mode == "WRITE") {
        $handle = fopen($file, "w");
        if (!fwrite($handle, $input)) {
            return false; // failed.
        } else {
            return true; //success.
        }
    } elseif ($mode == "READ/WRITE") {       
        if (file_exists($file) && isset($input)) {
            $handle = fopen($file, "r+");
            $read = fread($handle, filesize($file));
            $data = $read.$input;
            if (!fwrite($handle, $data)) {
                return false; // failed.
            } else {
                return true; // success.
            }
        } else {
            return false; // failed.
        }
    } else {
        return false; // failed.
    }
    fclose($handle);
}

?>