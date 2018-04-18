<!DOCTYPE html>
<html lang="en">
 <!--head-->
    {block name='head'}{include file='layout/head.tpl'}{/block} 
  <body>

  <!--header-->
      {block name='header'}{include file='layout/header.tpl'}{/block} 
  
  <!--nav-->
      {block name='nav'}{include file='layout/nav.tpl'}{/block} 
    <!-- banner-->
      {block name='banner'}{/block} 
    <!--content-->
      {block name='content'}{/block} 
      <!-- FOOTER -->
      
      {block name='footer'}{include file='layout/footer.tpl'}{/block} 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      {block name='script'}{include file='layout/script.tpl'}{/block} 
  </body>
</html>