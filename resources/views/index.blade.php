<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Kick Sports</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="{{asset('css/base.css')}}">
   <link rel="stylesheet" href="{{asset('css/vendor.css')}}" >  
   <link rel="stylesheet" href="{{asset('css/main.css')}}">
        

   <!-- script
   ================================================== -->
   <script src="{{asset('js/modernizr.js')}}"></script>
   <script src="{{asset('js/pace.min.js')}}"></script>

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   <header class="short-header">   

   	<div class="gradient-block"></div>	

   	<div class="row header-content">

   		<div class="logo">
	         <a href="/"></a>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation sf-menu">
					<li class="current"><a href="/" title="">Home</a></li>	
					<li><a href="{{ route('login') }}" title="">Admin</a></li>										
				</ul>
			</nav> <!-- end main-nav-wrap -->

			<div class="search-wrap">
				<form role="search" method="get" class="search-form">
					<label>
						<span class="hide-content">Search for:</span>
						<input type="search" class="search-field" placeholder="Type Your Keywords" value="{{ request()->get('search') }}" name="search" title="Search for:" autocomplete="off">
					</label>
					<input type="submit" class="search-submit" value="Search">
				</form>

				<a href="#" id="close-search" class="close-btn">Close</a>

			</div> <!-- end search wrap -->	

			<div class="triggers">
				<a class="search-trigger" href="#"><i class="fa fa-search"></i></a>
				<a class="menu-toggle" href="#"><span>Menu</span></a>
			</div> <!-- end triggers -->	
   		
   	</div>     		
   	
   </header> <!-- end header -->


   <!-- masonry
   ================================================== -->
   <section id="bricks">

   	<div class="row masonry">

   		<!-- brick-wrapper -->
         <div class="bricks-wrapper">

         	<div class="grid-sizer"></div> 

            @foreach($news as $brt)
         	<article class="brick entry animate-this">
               <div class="entry-thumb">
                  <a href="{{url('/' .$brt->id_news. '/detail')}}" class="thumb-link">
	                  <img src="{{ url('/image/'.$brt->gambar) }}" alt="Pattern">              
                  </a>
               </div>
               <div class="entry-text">
               	<div class="entry-header">
                     <div class="entry-meta">
                        <span class="cat-links">
                           {{ $brt->tgl_news }}                          
                        </span>        
                     </div>
               		<h4 class="entry-title"><a href="{{url('/' .$brt->id_news. '/detail')}}">{{ $brt->judul_news }}</a></h4>               		
               	</div>
						<div class="entry-excerpt">
							{{ $brt->potongan_news }} 
						</div>
                  <a href="{{url('/' .$brt->id_news. '/detail')}}"><button style="height: 50px; margin-top: 10px;">Read More</button></a>
               </div>
        		</article> <!-- end article -->
            @endforeach
         </div> <!-- end brick-wrapper --> 
   	</div> <!-- end row -->
   </section> <!-- end bricks -->

   
   <!-- footer
   ================================================== -->
   <footer>
      <div class="footer-bottom">
      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright 2020</span>        	
		         </div>

		         <div id="go-top">
		            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
		         </div>         
	      	</div>

      	</div> 
      </div> <!-- end footer-bottom -->  

   </footer>  

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="{{asset('js/jquery-2.1.3.min.js')}}"></script>
   <script src="{{asset('js/plugins.js ')}}"></script>
   <script src="{{asset('js/main.js')}}"></script>

</body>

</html>