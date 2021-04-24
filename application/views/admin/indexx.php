
<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Asamurat</title>	
        <meta name="description" content="Aplikasi Manajemen Surat Menyurat">
		<meta name="author" content="Jonald Remus Sevellejo">
		<meta charset="UTF-8">
		
        <!-- Bootstrap -->
				<link href="images/logo.png" rel="icon" type="image">
				<link href="admin/bootstrap/css/index_background.css" rel="stylesheet" media="screen"/>
				<link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
				<link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
				<link href="admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen"/>
				<link href="admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen"/>
				<link href="admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen"/>
				<link href="admin/assets/styles.css" rel="stylesheet" media="screen"/>
				<!-- calendar css -->
				<link href="admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
				<!-- index css -->
				<link href="admin/bootstrap/css/index.css" rel="stylesheet" media="screen"/>
				<!-- data table css -->
				<link href="admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen"/>
				<!-- notification  -->
				<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
				<!-- wysiwug  -->
				<link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"/>
		<script src="admin/vendors/jquery-1.9.1.min.js"></script>
        <script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head><body id="login">
    <div class="container">
		<div class="row-fluid">
			<div class="span6"><div class="title_index">				
	<div class="row-fluid">
			<div class="span12"></div>
				  <div class="row-fluid">
						<div class="span10">
						<img class="index_logo" src="admin/images/sclogo.png">
						</div>	
						<div class="span12">
							<div class="motto">
							<p>WELCOME&nbsp;&nbsp;TO:</p>
							<p>Technology Resource Inventory System&nbsp;(TRIS)</p>												
							</div>											
						</div>							
				  </div>		   							
    </div>	
				</div></div>
			<div class="span6"><div class="pull-right">			
			<form id="login_form1" class="form-signin" method="post">
				<h3 class="form-signin-heading">
					<i class="icon-lock"></i> Please Login
				</h3>
				<input type="text"      class="input-block-level"   id="username" name="username" placeholder="Username" required>
				<input type="password"  class="input-block-level"   id="password" name="password" placeholder="Password" required>
				
				<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
				<script type="text/javascript">
				$(document).ready(function(){
				$('#signin').tooltip('show');
				$('#signin').tooltip('hide');
				});
				</script>		
			</form>
						<script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true_admin')
									{
									$.jGrowl("Loading File Please Wait......", { sticky: true });
									$.jGrowl("Welcome to Technonlogy Resource Inventory System (T.R.S.)", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'admin/dashboard.php'  }, delay);  
									}else if (html == 'true'){
										$.jGrowl("Welcome to Technonlogy Resource Inventory System (T.R.S.)", { header: 'Access Granted' });
									var delay = 1000;
										setTimeout(function(){ window.location = 'technical Staff/dashboard_client.php'  }, delay);  
									}else
									{
									$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
									}
									}
								});
								return false;
							});
						});
						</script>
			</div></div>
		</div>
		<div class="row-fluid">
           <div class="offset2">		
			   <div class="span11"><div class="index-footer">
<div class="navbar">
     <div class="navbar-inner">
         <div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
				<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			</a>
             
	<div class="nav-collapse collapse">
		<ul class="nav" id="footer_nav">
		  <li class="divider-vertical"></li>
		      <li class="active"><a href="index.php"><i class="icon-home"></i>&nbsp;Home</a></li>
		      <li class="divider-vertical"></li>
		      <li><a href="about.php"><i class="icon-info-sign"></i>&nbsp;About</a></li>						
			  <li class="divider-vertical"></li>
		      <li><a href="history.php"><i class="icon-file"></i>&nbsp;History</a></li>
			  <li class="divider-vertical"></li>
		      <li><a href="developers.php"><i class="icon-group"></i>&nbsp;Developers</a></li>
		  <li class="divider-vertical"></li>	
	    </ul>
	 </div>
        <!--/.nav-collapse -->
     </div>
   </div>
</div>

	</div></div>		
		   </div>
	    </div>
			<center>
		<footer>
		<p>Technology Resource Inventory System (T.R.I.S) Copyright 2015</p>	
		</footer>
</center>

    </div>
       <link href="admin/assets/styles.css" rel="stylesheet" media="screen">      
	
	
	   <!--------------------------------------/.fluid-container-------------------------------------->
        <link href="admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen"> 
        <script src="admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="admin/assets/scripts.js"></script>
				<script>
				$(function() {
				<!-----------------------Easy pie charts---------------------------------->
					$('.chart').easyPieChart({animate: 1000});
				});
				</script>
				
				
		<!------------------------------------- jgrowl-------------------------------------------- -->
		<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>   
				<script>
				$(function() {
					$('.tooltip').tooltip();	
					$('.tooltip-left').tooltip({ placement: 'left' });	
					$('.tooltip-right').tooltip({ placement: 'right' });	
					$('.tooltip-top').tooltip({ placement: 'top' });	
					$('.tooltip-bottom').tooltip({ placement: 'bottom' });
					$('.popover-left').popover({placement: 'left', trigger: 'hover'});
					$('.popover-right').popover({placement: 'right', trigger: 'hover'});
					$('.popover-top').popover({placement: 'top', trigger: 'hover'});
					$('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
					$('.notification').click(function() {
						var $id = $(this).attr('id');
						switch($id) {
							case 'notification-sticky':
								$.jGrowl("Stick this!", { sticky: true });
							break;
							case 'notification-header':
								$.jGrowl("A message with a header", { header: 'Important' });
							break;
							default:
								$.jGrowl("Hello world!");
							break;
						}
					});
				});
				</script>
			<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<link href="admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
			<link href="admin/vendors/chosen.min.css" rel="stylesheet" media="screen">
		<!--  -->
		<script src="admin/vendors/jquery.uniform.min.js"></script>
        <script src="admin/vendors/chosen.jquery.min.js"></script>
        <script src="admin/vendors/bootstrap-datepicker.js"></script>
		<!--  -->
			<script src="admin/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
			<script src="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
			<script src="admin/vendors/ckeditor/ckeditor.js"></script>
			<script src="admin/vendors/ckeditor/adapters/jquery.js"></script>
			<script type="text/javascript" src="admin/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        $(function() {
           <!-------------------------------Ckeditor standard-------------------------------------->
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });
        </script>
		<!-- ----------<script type="text/javascript" src="admin/assets/modernizr.custom.86080.js"></script> ------------------------->
		<script src="admin/assets/jquery.hoverdir.js"></script>
		<link rel="stylesheet" type="text/css" href="admin/assets//style.css" />
			<script type="text/javascript">
			$(function() {
				$('#da-thumbs > li').hoverdir();
			});
			</script>
			<script src="admin/vendors/fullcalendar/fullcalendar.js"></script>
			<script src="admin/vendors/fullcalendar/gcal.js"></script>
			<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<script src="admin/vendors/bootstrap-datepicker.js"></script>
						<script>
						$(function() {
							$(".datepicker").datepicker();
							$(".uniform_on").uniform();
							$(".chzn-select").chosen();
							$('#rootwizard .finish').click(function() {
								alert('Finished!, Starting over!');
								$('#rootwizard').find("a[href*='tab1']").trigger('click');
							});
						});
						</script></body>
<embed src="sound/enterauthorizationcode.mp3" controller="true" autoplay="true" autostart="True" width="0" height="0" /></html>