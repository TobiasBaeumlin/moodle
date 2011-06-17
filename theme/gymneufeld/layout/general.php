<?php

$hasheading = ($PAGE->heading);
$hascustomheading = ($PAGE->heading != "Gymnasium Neufeld");
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
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php echo $PAGE->bodyid ?>" class="<?php echo $PAGE->bodyclasses.' '.join(' ', $bodyclasses) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">

    <?php if ($hasheading || $hasnavbar) { ?>
           <div id="wrapper" class="clearfix">

<!-- START OF HEADER -->

            <div id="page-header" class="inside">
                <div id="page-header-wrapper" class="wrapper clearfix">

                    <?php if ($hasheading) { ?>
		    	  <div id="header-logo">
		    	       <img src="<?php echo $OUTPUT->pix_url('GymnasiumNeufeld700', 'theme'); ?>" alt="Gymnasium Neufeld" />
			  </div>
                        <div class="headermenu">
                           <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                        </div>
                    <?php  }?>
                    <?php if ($hascustommenu) { ?>
                    <div id="custommenu"><?php echo $custommenu; ?></div>
                    <?php } ?>
                </div>
            </div>
            
            <?php if ($hasnavbar) { ?>
                <div class="navbar">
         	    <?php echo $OUTPUT->login_info(); ?>
                    <div class="wrapper clearfix">
                        <div class="navbutton"> 
			   <?php  echo $PAGE->button; ?>
			</div>
                    </div>
                </div>
            <?php } ?>	                
           
 	    <?php if ($hascustomheading) { ?>
	       <div id="customheading">
                    <div class="wrapper clearfix">
	       	    	<?php echo $PAGE->heading ?>
                    </div>
	       </div>
	    <?php } ?>

<!-- END OF HEADER -->

    <?php } ?>


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
        </div>

<!-- END OF CONTENT -->

    <?php if ($hasheading || $hasnavbar) { ?>
    <div class="myclear"></div>
        </div>
    <?php } ?>

<!-- START OF FOOTER -->

</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>