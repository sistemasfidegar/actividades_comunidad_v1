
<head>
	<script src="resources/js/ligth/js/jquery-1.10.2.min.js"></script>
	<script src="resources/js/ligth/js/lightbox-2.6.min.js"></script>
	<link rel="stylesheet" href="resources/js/ligth/css/lightbox.css" media="screen"/>
	<link rel="stylesheet" href="resources/js/ligth/css/screen.css" media="screen"/>
	
</head>
<body>


	<section id="intro" class="content">

			<div class="image-set">
			<div class="col-md-6">
			<?php foreach ($imagen as $value){?>
			    <div class="col-md-4">
				  <a class="example-image-link" href="<?php echo $value['ruta_archivo'];?>" data-lightbox="example-set" title="Actividades Comunidad Prepa Sí">
				  <img class="example-image" src="<?php echo $value['ruta_archivo'];?>" alt="Actividades Comunidad Prepa Sí" width="150" height="70"/></a>
				</div>
				<?php }?>
			</div>
		</div>
	</section>
