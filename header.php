<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
		<title>
			<?php
				/*
				 * Print the <title> tag based on what is being viewed.
				 */
				global $page, $paged, $post;
			
				wp_title( '|', true, 'right' );
			
				// Add the blog name.
				bloginfo( 'name' );
			
				// Add the blog description for the home/front page.
				$site_description = get_bloginfo( 'description', 'display' );
				if ( $site_description && ( is_home() || is_front_page() ) )
					echo " | $site_description";
			
				// Add a page number if necessary:
				if ( $paged >= 2 || $page >= 2 )
					echo ' | ' . sprintf( __( 'Page %s', 'wpv' ), max( $paged, $page ) );
            ?>
	</title>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header class="h-auto shadow-md py-5 font-[Roboto]">
            <nav class="container mx-auto px-4 flex items-center justify-between ">
                <div class="sm:hidden flex items-center">
                    <button>
                       <IoMdClose size={24} />
                               
                    </button>
                </div>
                <div class="sm:pl-0 pl-7 sm:w-1/3 w-full">
                    <Link href="/">
                        <Image src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="logo.svg" height="32px" width={300} class='max-h-[67px] object-cover' />
                    </Link>
                </div>
                <div class="sm:w-2/3 w-full sm:justify-end sm:static absolute left-0 sm:py-0 py-7 sm:px-0 px-5 flex items-center ">
                    <ul class="flex sm:flex-row flex-col sm:items-center md:gap-[3vw] gap-5">
                        <li>
                            <Link href="#" class='text-base font-normal text-[#215690] hover:text-[#ef9831] font-[Roboto]'>TV</Link>
                        </li>
                        <li>
                            <Link href="#" class='text-base font-normal text-[#215690] hover:text-[#ef9831] font-[Roboto]'>Internet</Link>
                        </li>
                        <li>
                            <Link href="/providers" class='text-base font-normal text-[#215690] hover:text-[#ef9831] font-[Roboto]'>Providers</Link>
                        </li>
                        <li>
                            <Link href="#" class='text-base font-normal text-[#215690] hover:text-[#ef9831] font-[Roboto]'>Resources</Link>
                        </li>
                        <Link href="tel:855-512-0491" class="items-center gap-2 text-[#ef9831] font-[Roboto] flex justify-end">
                            <BsTelephoneFill size={18} />
                            <span class="text-base font-normal">855-512-0491</span>
                        </Link>
                    </ul>
                </div>
            </nav>
        </header>
