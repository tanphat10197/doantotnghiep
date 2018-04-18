<!DOCTYPE html>
<html>
  <!-- head-->
  {block name='head'}{include file='layoutAdmin/head.tpl'}{/block} 
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- header-->
	  {block name='header'}{include file='layoutAdmin/header.tpl'}{/block} 

	  <!--aside-->
	  {block name='aside'}{include file='layoutAdmin/aside.tpl'}{/block} 

      <div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
	 			{block name='content'}{/block}    		
			</section>
      </div>

     <!-- footer-->
		{block name='footer'}{include file='layoutAdmin/footer.tpl'}{/block} 

     <!--slidebar-->
		{block name='slidebar'}{include file='layoutAdmin/slidebar.tpl'}{/block} 
	 
	 
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- javascript -->
   {block name='script'}{include file='layoutAdmin/script.tpl'}{/block} 	
  </body>
</html>
