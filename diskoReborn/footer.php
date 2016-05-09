<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

            <br class="clear" />
            <footer class="footer">
                <ul>
                    <li><a href="mailto:info@disko.co.za" title="contact" target="_blank">contact</a>&nbsp;|&nbsp;</li>
                    <li><a href="https://www.instagram.com/disko/" title="instagram" target="_blank">instagram</a>&nbsp;|&nbsp;</li>
                    <li><a href="https://www.behance.net/disko" title="behance" target="_blank">behance</a></li>
                </ul>
            </footer>
        </div>
    </div>
    <script type="text/javascript">
    var navigation = responsiveNav(".nav-collapse", {
        animate: true,
        transition: 284,
        label: "Menu",
        insert: "after",
        customToggle: "",
        closeOnNavClick: false,
        openPos: "relative",
        navClass: "nav-collapse",
        navActiveClass: "js-nav-active",
        jsClass: "js",
        init: function() {},
        open: function() {},
        close: function() {}
    });
    </script>

    <?php wp_footer(); 
	// This fxn allows plugins to insert themselves/scripts/css/files (right here) into the footer of your website. 
	// Removing this fxn call will disable all kinds of plugins. 
	// Move it if you like, but keep it around.
	?>

</body>
</html>

