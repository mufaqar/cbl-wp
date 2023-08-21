<?php /** Template Name: Home */ get_header();?>
<section class="flex justify-center mt-10 ">
    <div class="bg-[#F3FAFF] container mx-auto px-4 shadow-xl rounded-3xl sm:px-10 grid md:grid-cols-2 items-center">
        <div class="py-10">
            <h1 class="sm:text-5xl text-2xl font-bold">
                Find <span class="text-[#ef9831]">Internet & TV Providers</span> in Your Area
            </h1>
            <div class="w-full py-5 mt-6 bg-white border md:h-52 rounded-3xl">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/result' ) ); ?>">
                <div class="relative flex items-center w-full sm:px-12 px-6 mt-6 md:mt-10">
                    <FaMagnifyingGlass class="absolute ml-3" />
                    <input type="text" placeholder="Enter Zip Code" name="zip_code" value="" onChange=""
                        class="w-full py-3 pl-10 pr-8 border outline-none md:w-80 border-zinc-400 rounded-l-md" />
                    <button
                        class="px-4 py-[13px] font-semibold text-white bg-[#ef9831] border-[#ef9831] rounded-r-md">Search</button>
                </div>
            </form>

            </div>
        </div>
        <div class="sm:block hidden">
            <img src="<?php bloginfo('template_directory'); ?>/images/hso.webp" alt="" class="ml-auto h-[485px] " />
        </div>
    </div>
</section>
<section class="pb-10 md:-mt-11 bg-[#F3FAFF]">
    <div class="container mx-auto px-4 relative grid gap-5 md:grid-cols-3">
        <ServiceBox img="/images/laptopIcon.svg" title="Compare Top Providers"
            content="Don’t pay for more than you need! Use our Internet Speed Calculator to determine the best internet speed for your lifestyle."
            link="#" />
        <ServiceBox img="/images/compareIcon.svg" title="Compare Top Providers"
            content="Don’t pay for more than you need! Use our Internet Speed Calculator to determine the best internet speed for your lifestyle."
            link="#" />
        <ServiceBox img="/images/meterIcon.svg" title="Compare Top Providers"
            content="Don’t pay for more than you need! Use our Internet Speed Calculator to determine the best internet speed for your lifestyle."
            link="#" />
    </div>
</section>

<section>
    <div class='container mx-auto px-4 mt-10'>
        <div class="mt-20 mb-7">
            <h2 class='text-center text-2xl font-bold'>
                Compare Internet Providers in Major Cities
            </h2>
        </div>
        <div>
            <CityBox />
        </div>
    </div>
</section>

<section class='md:my-40 my-10'>
    <div class='container mx-auto px-4 mt-10 grid md:grid-cols-2 grid-cols-1 gap-5 items-center'>
        <div class="">
            <h2 class='text-3xl font-bold'>
                Enter your zip code to find providers and plans in your area.
            </h2>
        </div>
        <div>
            <div class="relative flex items-center w-full sm:px-12 px-6 mt-6 md:mt-10">
                <FaMagnifyingGlass class="absolute ml-3" />
                <input type="text" placeholder="Enter Zip Code" name="zip_code" value=""
                    class="w-full py-3 pl-10 pr-8 border outline-none md:w-80 border-zinc-400 rounded-l-md" />
                <button class="px-4 py-[13px] font-semibold text-white bg-[#ef9831] border-[#ef9831] rounded-r-md"
                    onClick={handleState}>Search</button>
            </div>
        </div>
    </div>
</section>

<section class="flex md:flex-row flex-col bg-gradient-to-r from-white via-white to-[#F3FAFF]">
    <div class='flex md:flex-row flex-col container mx-auto px-4 gap-7 items-center'>
        <div class="md:w-5/12 w-full">
            <h2 class="text-2xl font-bold">
                Review Top Providers
            </h2>
            <p class="text-base font-[Roboto] my-3">
                Let us help you sift through the noise by comparing the top providers near you. Find high-speed options
                for internet, TV, or bundles that meet your needs.
            </p>
            <Link href="https://www.highspeedoptions.com/disclosure" class="text-[#215690] font-[Roboto] ">
            View All Providers
            </Link>
        </div>
        <div class="md:w-7/12 w-full">
            <div class='rounded-l-[90px] bg-[#F3FAFF] py-20 px-5'>
                <Brands />
            </div>
        </div>
    </div>
</section>
<Why_ChooseUs />



<?php get_footer()?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">   
   jQuery(document).ready(function($) {    
        $("#loginform").submit(function(e) {          
            e.preventDefault();
            var username = jQuery('#username').val();
            var password = jQuery('#password').val();       
            jQuery.ajax({
            type:"POST",
            url:"<?php echo admin_url('admin-ajax.php'); ?>",
            data: {
                action: "userlogin",
                username : username,
                password : password
            },
            success: function(response){
              // alert(response.message);
               window.location.href = "<?php echo home_url('/login'); ?>";
            },
            error: function(response) {
                alert(response.message);
            }
            });
        });
	
	});
	</script>
