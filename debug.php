<?php
/*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license.
*/

require 'scripts/pi-hole/php/header_authenticated.php';
?>
<!-- Title -->
<div class="page-header">
    <h1><?php echo $languages['generate_debug_log_title']; ?></h1>
</div>
<div class="box">
    <div class="box-header with-border"><h1 class="box-title"><?php echo $languages['options']; ?></h1></div>
    <div class="box-body">
        <div>
            <input type="checkbox" id="dbcheck">
            <label for="dbcheck">
                <strong><?php echo $languages['execute_database_integrity_check']; ?></strong>
                <br class="hidden-md hidden-lg">
                <span class="text-red"><?php echo $languages['database_integrity_check_warning']; ?></span>
            </label>
        </div>
        <div>
            <input type="checkbox" id="upload">
            <label for="upload">
                <strong><?php echo $languages['upload_debug_log_and_provide_debug_token']; ?></strong>
                <br class="hidden-md hidden-lg">
                <span><?php echo $languages['url_token_information']; ?></span>
            </label>
        </div>
    </div>
</div>
<br>
<p><?php echo $languages['debug_log_generation_info']; ?></p>
<button type="button" id="debugBtn" class="btn btn-lg btn-primary btn-block"><?php echo $languages['generate_debug_log_button']; ?></button>
<pre id="output" style="width: 100%; height: 100%;" hidden></pre>

<script src="<?php echo fileversion('scripts/pi-hole/js/debug.js'); ?>"></script>

<?php
require 'scripts/pi-hole/php/footer.php';
?>
