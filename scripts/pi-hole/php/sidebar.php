    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img class="logo-img" src="img/logo.svg" alt="Pi-hole logo">
                </div>
                <div class="pull-left info">
                    <p><?php echo $languages['status']; ?></p>
                    <?php
                    $pistatus = piholeStatus();
                    if ($pistatus == 53) {
                        echo '<span id="status"><i class="fa fa-w fa-circle text-green-light"></i> '.$languages['active'].'</span>';
                    } elseif ($pistatus == 0) {
                        echo '<span id="status"><i class="fa fa-w fa-circle text-red"></i> '.$languages['blocking_disabled'].'</span>';
                    } elseif ($pistatus == -1) {
                        echo '<span id="status"><i class="fa fa-w fa-circle text-red"></i> '.$languages['dns_not_running'].'</span>';
                    } elseif ($pistatus == -2) {
                        echo '<span id="status"><i class="fa fa-w fa-circle text-red"></i> '.$languages['unknown'].'</span>';
                    } else {
                        echo '<span id="status"><i class="fa fa-w fa-circle text-orange"></i> DNS service on port '.$pistatus.'</span>';
                    }
                    ?>
                    <br/>
                    <?php
                    echo '<span title="Detected '.$nproc.' cores"><i class="fa fa-w fa-circle ';
                    if ($loaddata[0] > $nproc) {
                        echo 'text-red';
                    } else {
                        echo 'text-green-light';
                    }
                    echo '"></i> '. $languages['load'] .':&nbsp;&nbsp;'.$loaddata[0].'&nbsp;&nbsp;'.$loaddata[1].'&nbsp;&nbsp;'.$loaddata[2].'</span>';
                    ?>
                    <br/>
                    <?php
                    echo '<span><i class="fa fa-w fa-circle ';
                    if ($memory_usage > 0.75 || $memory_usage < 0.0) {
                        echo 'text-red';
                    } else {
                        echo 'text-green-light';
                    }
                    if ($memory_usage > 0.0) {
                        echo '"></i>'. $languages['memory_usage'] .':&nbsp;&nbsp;'.sprintf('%.1f', 100.0 * $memory_usage).'&thinsp;%</span>';
                    } else {
                        echo '"></i> '. $languages['memory_usage'] .':&nbsp;&nbsp; N/A</span>';
                    }
                    ?>
                    <br/>
                    <?php
                    if ($celsius >= -273.15) {
                        // Only show temp info if any data is available -->
                        $tempcolor = 'text-vivid-blue';
                        if (isset($temperaturelimit) && $celsius > $temperaturelimit) {
                            $tempcolor = 'text-red';
                        }
                        echo '<span id="temperature"><i class="fa fa-w fa-fire '.$tempcolor.'" style="width: 1em !important"></i> ';
                        echo $languages['temperature'].'&nbsp;<span id="rawtemp" hidden>'.$celsius.'</span>';
                        echo '<span id="tempunit" hidden>'.$temperatureunit.'</span>';
                        echo '<span id="tempdisplay"></span></span>';
                    }
                    ?>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header text-uppercase"><?php echo $languages['main']; ?></li>
                <!-- Home Page -->
                <li class="menu-main<?php if ($scriptname === 'index.php') { ?> active<?php } ?>">
                    <a href="index.php">
                        <i class="fa fa-fw menu-icon fa-home"></i> <span><?php echo $languages['dashboard']; ?></span>
                    </a>
                </li>

                <li class="header text-uppercase"><?php echo $languages['analysis']; ?></li>
                <!-- Query Log -->
                <li class="menu-analysis<?php if ($scriptname === 'queries.php') { ?> active<?php } ?>">
                    <a href="queries.php">
                        <i class="fa fa-fw menu-icon fa-file-alt"></i> <span><?php echo $languages['query_log']; ?></span>
                    </a>
                </li>
                <!-- Long-term database -->
                <li class="menu-analysis treeview<?php if ($scriptname === 'db_queries.php' || $scriptname === 'db_lists.php' || $scriptname === 'db_graph.php') { ?> active<?php } ?>">
                    <a href="#">
                        <i class="fa fa-fw menu-icon fa-history"></i> <span><?php echo $languages['long_term_data']; ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($scriptname === 'db_graph.php') { ?> active<?php } ?>">
                            <a href="db_graph.php">
                                <i class="fa fa-fw menu-icon fa-chart-bar"></i> <?php echo $languages['graphics']; ?>
                            </a>
                        </li>
                        <li class="<?php if ($scriptname === 'db_queries.php') { ?> active<?php } ?>">
                            <a href="db_queries.php">
                                <i class="fa fa-fw menu-icon fa-file-alt"></i> <?php echo $languages['query_log']; ?>
                            </a>
                        </li>
                        <li class="<?php if ($scriptname === 'db_lists.php') { ?> active<?php } ?>">
                            <a href="db_lists.php">
                                <i class="fa fa-fw menu-icon fa-list"></i> <?php echo $languages['top_lists']; ?>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="header text-uppercase"><?php echo $languages['group_management']; ?></li>
                <!-- Group Management -->
                <li class="menu-group<?php if ($scriptname === 'groups.php') { ?> active<?php } ?>">
                    <a href="groups.php">
                        <i class="fa fa-fw menu-icon fa-user-friends"></i> <span><?php echo $languages['groups']; ?></span>
                    </a>
                </li>
                <li class="menu-group<?php if ($scriptname === 'groups-clients.php') { ?> active<?php } ?>">
                    <a href="groups-clients.php">
                        <i class="fa fa-fw menu-icon fa-laptop"></i> <span><?php echo $languages['clients']; ?></span>
                    </a>
                </li>
                <li class="menu-group<?php if ($scriptname === 'groups-domains.php') { ?> active<?php } ?>">
                    <a href="groups-domains.php">
                        <i class="fa fa-fw menu-icon fa-list"></i> <span><?php echo $languages['domains']; ?></span>
                    </a>
                </li>
                <li class="menu-group<?php if ($scriptname === 'groups-adlists.php') { ?> active<?php } ?>">
                    <a href="groups-adlists.php">
                        <i class="fa fa-fw menu-icon fa-shield-alt"></i> <span><?php echo $languages['adlists']; ?></span>
                    </a>
                </li>

                <li class="header text-uppercase"><?php echo $languages['dns_control']; ?></li>
                <!-- Local DNS Records -->
                <!-- Enable/Disable Blocking -->
                <li id="pihole-disable" class="menu-dns treeview"<?php if ($pistatus == '0') { ?> hidden<?php } ?>>
                    <a href="#">
                        <i class="fa fa-fw menu-icon fa-stop"></i> <span><?php echo $languages['disable_blocking']; ?>&nbsp;&nbsp;&nbsp;<span id="flip-status-disable"></span></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#" id="pihole-disable-indefinitely">
                                <i class="fa fa-fw menu-icon fa-infinity"></i> <?php echo $languages['indefinitely']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="pihole-disable-10s">
                                <i class="fa fa-fw menu-icon fa-clock"></i> <?php echo $languages['for_10_seconds']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="pihole-disable-30s">
                                <i class="fa fa-fw menu-icon fa-clock"></i> <?php echo $languages['for_30_seconds']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="pihole-disable-5m">
                                <i class="fa fa-fw menu-icon fas fa-clock"></i> <?php echo $languages['for_5_minutes']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="pihole-disable-cst" data-toggle="modal" data-target="#customDisableModal">
                                <i class="fa fa-fw menu-icon fa-user-clock"></i> <?php echo $languages['custom_time']; ?>
                            </a>
                        </li>
                    </ul>
                    <!-- <a href="#" id="flip-status"><i class="fa fa-stop"></i> <span>Disable</span></a> -->
                </li>
                <li id="pihole-enable" class="menu-dns treeview"<?php if (!in_array($pistatus, array('0', '-1', '-2'))) { ?> hidden<?php } ?>>
                    <a href="#">
                        <i class="fa fa-fw menu-icon fa-play"></i>
                        <span id="enableLabel"><?php echo $languages['enable_blocking']; ?>&nbsp;&nbsp;&nbsp;
                            <span id="flip-status-enable"></span>
                        </span>
                    </a>
                </li>
                <li class="menu-dns treeview <?php if (in_array($scriptname, array('dns_records.php', 'cname_records.php'))) { ?>active<?php } ?>">
                    <a href="#">
                        <i class="fa fa-fw menu-icon fa-address-book"></i> <span><?php echo $languages['local_dns']; ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if ($scriptname === 'dns_records.php') { ?> active<?php } ?>">
                            <a href="dns_records.php">
                                <i class="fa fa-fw menu-icon fa-address-book"></i> <?php echo $languages['dns_records']; ?>
                            </a>
                        </li>
                        <li class="<?php if ($scriptname === 'cname_records.php') { ?> active<?php } ?>">
                            <a href="cname_records.php">
                                <i class="fa fa-fw menu-icon fa-address-book"></i> <?php echo $languages['cname_records']; ?>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="header text-uppercase"><?php echo $languages['system']; ?></li>
                <!-- Tools -->
                <li class="menu-system treeview<?php if (in_array($scriptname, array('messages.php', 'gravity.php', 'queryads.php', 'auditlog.php', 'taillog.php', 'taillog-FTL.php', 'debug.php', 'network.php'))) { ?> active<?php } ?>">
                    <a href="#">
                        <i class="fa fa-fw menu-icon fa-tools"></i> <span><?php echo $languages['tools']; ?></span>
                        <span class="warning-count hidden"></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <!-- Pi-hole diagnosis -->
                        <li class="<?php if ($scriptname === 'messages.php') { ?> active<?php } ?>">
                            <a href="messages.php">
                                <i class="fa fa-fw menu-icon fa-file-medical-alt"></i> <?php echo $languages['pihole_diagnosis']; ?>
                                <span class="pull-right-container warning-count hidden"></span>
                            </a>
                        </li>
                        <!-- Run gravity.sh -->
                        <li class="<?php if ($scriptname === 'gravity.php') { ?> active<?php } ?>">
                            <a href="gravity.php">
                                <i class="fa fa-fw menu-icon fa-arrow-circle-down"></i> <?php echo $languages['update_gravity']; ?>
                            </a>
                        </li>
                        <!-- Query Lists -->
                        <li class="<?php if ($scriptname === 'queryads.php') { ?> active<?php } ?>">
                            <a href="queryads.php">
                                <i class="fa fa-fw menu-icon fa-search"></i> <?php echo $languages['search_adlists']; ?>
                            </a>
                        </li>
                        <!-- Audit log -->
                        <li class="<?php if ($scriptname === 'auditlog.php') { ?> active<?php } ?>">
                            <a href="auditlog.php">
                                <i class="fa fa-fw menu-icon fa-balance-scale"></i> <?php echo $languages['audit_log']; ?>
                            </a>
                        </li>
                        <!-- Tail pihole.log -->
                        <li class="<?php if ($scriptname === 'taillog.php') { ?> active<?php } ?>">
                            <a href="taillog.php">
                                <svg class="svg-inline--fa fa-fw menu-icon" style="height: 1.25em"><use xlink:href="img/pihole_icon.svg#pihole-svg-logo"/></svg>
                                <?php echo $languages['tail_pihole_log']; ?>
                            </a>
                        </li>
                        <!-- Tail FTL.log -->
                        <li class="<?php if ($scriptname === 'taillog-FTL.php') { ?> active<?php } ?>">
                            <a href="taillog-FTL.php">
                                <svg class="svg-inline--fa fa-fw menu-icon" style="height: 1.25em"><use xlink:href="img/pihole_icon.svg#pihole-svg-logo"/></svg>
                                <?php echo $languages['tail_ftl_log']; ?>
                            </a>
                        </li>
                        <!-- Generate debug log -->
                        <li class="<?php if ($scriptname === 'debug.php') { ?> active<?php } ?>">
                            <a href="debug.php">
                                <i class="fa fa-fw menu-icon fa-ambulance"></i> <?php echo $languages['generate_debug_log']; ?>
                            </a>
                        </li>
                        <!-- Network -->
                        <li class="<?php if ($scriptname === 'network.php') { ?> active<?php } ?>">
                            <a href="network.php">
                                <i class="fa fa-fw menu-icon fa-network-wired"></i> <?php echo $languages['network']; ?>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Settings -->
                <li class="menu-system<?php if ($scriptname === 'settings.php') { ?> active<?php } ?>">
                    <a href="settings.php">
                        <i class="fa fa-fw menu-icon fa-cog"></i> <span><?php echo $languages['settings']; ?></span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
