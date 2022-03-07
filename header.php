<html>
    <head>
        <link rel="stylesheet" href="header.css">
    </head>
    <body>
    <!-- HEADER CONTENT -->
	<header id = "header">
		<div id="titleBar"> <!-- Title Bar-->
			<h1>IB CAS Project</h1>
		</div>
		
		<div id="navBar"> <!-- Nav Bar-->
			<p>
				<a href = "requestPage.php">Request Page</a>
				<a href = "adminPage.php">Admin Page</a>      
				<a href= "logout.php">Log Out</a>

			</p>
		</div>
	</header>

    <div id="ghost hidden"> </div>
    </body>
    <script>
        var header = $(header);
        var headerTop = header.offset().top;

        $(window).scroll(function(){
            var scrollTop = $(window).scrollTop();

            if(headerTop < scrollTop){
                header.addClass("fixed");
                $(".ghost").removeClass("hidden");
            }else{
                header.removeClass("fixed");
                $(".ghost").addClass("hidden");
            }
        });    
    </script>

</html>