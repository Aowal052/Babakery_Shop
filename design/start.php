
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Sweet Cakes | Bakery SHop</title>


		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,800,400,600' rel='stylesheet' type='text/css'>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/font-awesome.min.css" rel='stylesheet' type='text/css' />
		<link href="css/etalage.css" rel='stylesheet' type='text/css' />
		<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/style.css" rel='stylesheet' type='text/css' />

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.easydropdown.js"></script>
		<script src="js/jquery.etalage.min.js"></script>
		<script src="js/jquery.flexisel.js"></script>
		
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		
		<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
		
	</head>
	<body>