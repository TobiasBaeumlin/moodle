<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre) {
    $bodyclasses[] = 'side-pre-only';
} else if (!$showsidepre) {
    $bodyclasses[] = 'content-only';
}

if ($hascustommenu) {
    $bodyclasses[] = 'has-custom-menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta name="description" content="<?php echo strip_tags(format_text($SITE->summary, FORMAT_HTML)) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php echo $PAGE->bodyid ?>" class="<?php echo $PAGE->bodyclasses.' '.join(' ', $bodyclasses) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">

    <div id="wrapper" class="clearfix">
<!-- START OF HEADER -->

        <div id="page-header">
            <div id="page-header-wrapper" class="wrapper clearfix">

<!--                <h1 class="headermain"><?php echo $PAGE->heading ?></h1> -->
		<div id="header-logo">
		    <img src="<?php echo $OUTPUT->pix_url('GymnasiumNeufeld700', 'theme'); ?>" alt="Gymnasium Neufeld" />
		</div>
                <div class="headermenu">
                    <?php
                        echo $OUTPUT->login_info();
                        echo $OUTPUT->lang_menu();
                        echo $PAGE->headingmenu;
                    ?>
                </div>
                <?php if ($hascustommenu) { ?>
                <div id="custommenu"><?php echo $custommenu; ?></div>
                <?php } ?>
            </div>
        </div>
        
<!-- END OF HEADER -->

<!-- START OF CONTENT -->

        <div id="page-content-wrapper" class="wrapper clearfix">
            <div id="page-content">
                <div id="region-main-box">
                    <div id="region-pre-box">
            
                        <?php if ($hassidepre) { ?>
                        <div id="region-pre" class="block-region">
                            <div class="region-content">
                                <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                            </div>
                        </div>
                        <?php } ?>

                        <div id="region-main-wrap">
                            <div id="region-main">
                                <div class="region-content">
                                    <?php echo core_renderer::MAIN_CONTENT_TOKEN ?>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
            </div>
            <div class="myclear"></div>

        </div>
       

<!-- END OF CONTENT -->
    <div class="myclear"></div>
       </div> <!-- END #wrapper -->

</div> <!-- END #page -->

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>