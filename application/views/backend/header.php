<html>
<title>BusinessApp</title>

<head>
	<link rel="stylesheet" href="<?php echo base_url('assets').'/';?>bower_components/Materialize/bin/materialize.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url('assets').'/';?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url('assets').'/';?>css/font-awesome.min.css" rel="stylesheet">

	<script src="<?php echo base_url('assets').'/';?>bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url('assets').'/';?>bower_components/Materialize/bin/materialize.js"></script>
	<script src="<?php echo base_url('assets').'/';?>bower_components/Materialize/js/sideNav.js"></script>
	<script src="<?php echo base_url('assets').'/';?>js/chintantable.js"></script>
	<script src="<?php echo base_url('assets').'/';?>js/formInit.js"></script>


	<script src="<?php echo base_url('assets').'/';?>js/wysihtml5-0.3.0.js"></script>
	<script src="<?php echo base_url('assets').'/';?>js/bootstrap-wysihtml5.js"></script>
	<!--
       <script src="<?php echo base_url('assets').'/';?>js/jquery-1.7.2.min.js"></script>
-->
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<header>
		<div class="navbar-fixed">
			<nav class="top-nav">
				<div class="row">
					<div class="col m12 l12 search">
						<div class=logo>
							<a id="logo-container" href="#" class="brand-logo text-center">
								<div style="text-align:center; color: #fff; font-size: 38px;"><span style="margin-left: -29px;">Business</span><span style="font-weight: 500;">App</span></div>
							</a>
						</div>
						<a href="<?php echo site_url('login/logout'); ?>" class="waves-effect waves-light btn red " style="float:right;"> <i class="large material-icons ">power_settings_new</i> Logout</a>
						<!--
                          <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-primary">
                                        <i class="fa fa-sign-out fa-fw"></i> Logout
                                    </a>
-->

					</div>
				</div>
			</nav>
		</div>

		<a href="#" data-activates="slide-out" class="button-collapse top-nav full hide-on-large-only"><i class="mdi-navigation-menu"></i></a>
		<?php   $menus = $this->menu_model->viewmenus(); 	  ?>
			<ul id="slide-out" class="side-nav" style="left: 0px;">
				<?php  
				foreach($menus as $row)
				{  
					$pieces = explode("/", $row->url);
					$page2="";
					if(empty($pieces) || !isset($pieces[1]))
					{
						$page2="";
					}
					else
						$page2=$pieces[1];
					$submenus = $this->menu_model->getsubmenus($row->id);
					?>
					<li class="<?php if($page==$page2 || $page == strtolower($row->name)) { echo 'active'; } //echo $page2;
					if(count($submenus > 0)) 
					{ 
						$pages =  $this->menu_model->getpages($row->id);
						//echo $page2; 
						//print_r($pages);
						echo ' sub-menu'; 
						if(in_array($page, $pages,TRUE))
							echo ' active';
					}
					?> ">
						<a class="waves-effect waves-teal" href="<?php 
						if($row->url == " ")
							echo "javascript:; ";
						else if($row->linktype == 1) echo site_url($row->url);
						else if($row->linktype == 2) echo base_url($row->url);
						else if($row->linktype == 3) echo ($row->url);						
						?>" <?php if($row->linktype == 3) echo "target='_blank'"; ?>>
							<?php  
							if($row->icon != "")
							{  ?>
								<i class="<?php echo $row->icon; ?>"></i>
					<?php	}
							?>
							<span><?php echo $row->name;  ?></span>
							<span class="arrow"></span>
						</a>
						<?php
						if(count($submenus) > 0)
						{  ?>
							<ul class="sub">
								<?php
								foreach($submenus as $row2)
								{ 
									$pieces2 = explode("/", $row2->url);
					
									if(empty($pieces2) || !isset($pieces2[1]))
									{
										$page3="";
									}
									else
										$page3=$pieces2[1];
								?>
									<li class="<?php if($page==$page3 || $page == strtolower($row2->name)) { echo 'active'; } ?>">
										<a class="waves-effect waves-teal" href="<?php 
											if($row2->url == " ")
												echo "javascript:; ";
											else if($row2->linktype == 1) echo site_url($row2->url);
											else if($row2->linktype == 2) echo base_url($row2->url);
											else if($row2->linktype == 3) echo ($row2->url);		
										?>">
											<?php  
											if($row2->icon != "")
											{  ?>
												<i class="<?php echo $row2->icon; ?>" <?php if($row2->linktype == 3) echo "target='_blank'"; ?>></i>
												<?php	}
											?>
													<?php echo $row2->name;  ?>
										</a>
									</li>
									<?php	}
								?>
							</ul>
							<?php	}
						?>
					</li>
					<?php }
				?>


			</ul>


	</header>
	<script>
		$('.button-collapse').sideNav({
			menuWidth: 300, // Default is 240
			edge: 'left', // Choose the horizontal origin
			closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
		});
	</script>
	<main>