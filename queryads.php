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
    <h1><?php echo $languages['find_blocked_domain_title']; ?></h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <!-- domain-search-block - Single search field mobile/desktop -->
                <div id="domain-search-block" class="input-group">
                    <input id="domain" type="url" class="form-control" placeholder="<?php echo $languages['domain_search_placeholder']; ?>" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                    <input id="quiet" type="hidden" value="no">
                    <span class="input-group-btn">
                        <button type="button" id="btnSearch" class="btn btn-default"><?php echo $languages['search_partial_match']; ?></button>
                        <button type="button" id="btnSearchExact" class="btn btn-default"><?php echo $languages['search_exact_match']; ?></button>
                    </span>
                </div>
            </div>
            <div class="box-body">
                <!-- /domain-search-block -->
                <div id="limitbox-block">
                    <input type="checkbox" id="show-all">
                    <label for="show-all"><strong><?php echo $languages['show_unlimited_results']; ?></strong> <br class="hidden-md hidden-lg"><?php echo $languages['slow_if_many_domains']; ?> <span class="text-red"><?php echo $languages['use_with_caution']; ?></span>.</label>
                </div>
            </div>
        </div>
    </div>
</div>

<pre id="output" style="width: 100%; height: 100%;" hidden></pre>

<script src="<?php echo fileversion('scripts/pi-hole/js/queryads.js'); ?>"></script>
<?php
require 'scripts/pi-hole/php/footer.php';
?>
