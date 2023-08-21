<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CBL_Theme
 */

?>


<footer class='bg-[#111827] pt-32 pb-8'>
    <div class='container mx-auto px-4 grid md:grid-cols-4 grid-cols-1 gap-5'>
        <div>
            <Link href="/">
            <Image src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="logo.svg" height={32} width={300}
                class='max-h-[67px] object-cover' />
            </Link>
            <p class='text-sm font-normal text-white/75 mt-5'>
                Making the world a better place through constructing elegant hierarchies.
            </p>
            <ul class='flex gap-5 mt-5'>
                <li>
                    <Link href="#" class='text-white/75 hover:text-white text-2xl'>
                    <BiLogoFacebookCircle />
                    </Link>
                </li>
                <li>
                    <Link href="#" class='text-white/75 hover:text-white text-2xl'>
                    <BiLogoTwitter />
                    </Link>
                </li>
                <li>
                    <Link href="#" class='text-white/75 hover:text-white text-2xl'>
                    <BiLogoLinkedinSquare />
                    </Link>
                </li>
                <li>
                    <Link href="#" class='text-white/75 hover:text-white text-2xl'>
                    <BiLogoYoutube />
                    </Link>
                </li>
            </ul>
        </div>
        <div>
            <h6 class='text-lg font-normal text-white mb-5'>
                SERVICES
            </h6>
            <ul class='grid gap-3'>
             
                 <li key={idx}>
                    <Link href={item?.link} class='text-sm font-medium capitalize text-white/75 hover:text-white'>
                    {item?.name}
                    </Link>
                </li>
              
            </ul>
        </div>
        <div>
            <h6 class='text-lg font-normal text-white mb-5'>
                PROVIDERS
            </h6>
            <ul class='grid md:grid-cols-2 grid-cols-1 gap-3'>

                <li >
                    <Link href={item?.link} class='text-sm font-medium capitalize text-white/75 hover:text-white'>
                    Name
                    </Link>
                </li>
            
            </ul>
        </div>
        <div>
            <h6 class='text-lg font-normal text-white mb-5'>
                COMPANY
            </h6>
            <ul class='grid gap-3'>

                <li key={idx}>
                    <Link href={item?.link} class='text-sm font-medium capitalize text-white/75 hover:text-white'>

                    </Link>
                </li>

            </ul>
        </div>
    </div>
    <div class='container mx-auto px-4 mt-24 pt-8 border-t border-white/20'>
        <p class='text-sm font-normal text-white/75'>
            Copyright © 2023 cablemovers.net. All rights reserved.
        </p>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>