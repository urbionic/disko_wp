<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to finish 
	/* rendering the page and display the footer area/content
	/*-----------------------------------------------------------------------------------*/
?>

            <br class="clear" />
            <footer class="footer">
                <ul>
                    <li><a href="mailto:info@disko.co.za" title="contact" target="_blank">Contact</a>&nbsp; | &nbsp;</li>
                    <li><a href="https://www.instagram.com/disko3d/" title="Disko Instagram page" target="_blank">Instagram</a>&nbsp; | &nbsp;</li>
                    <li><a href="http://www.behance.net/FerdiDisko" title="Disko Behance page" target="_blank">Behance</a>&nbsp; | &nbsp;</li>
                    <li><a href="http://www.facebook.com/Disko3DIllustration" title="Disko Facebook page" target="_blank">Facebook</a>&nbsp; | &nbsp;</li>
                    <li><a href="http://pinterest.com/ferdidisko/" title="Disko Pinterest page" target="_blank">Pinterest</a></li>

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

