		<script type="text/javascript" src="<?php echo base_url('js/instafeed.js') ?>"></script>

		<script type="text/javascript">
	    var feed = new Instafeed({
	        get: 'user',
	        userId: '2024327381',
	        clientId: '7f8ab92e062e4d8a94041ed3097264ab',
	        accessToken: '2024327381.7f8ab92.fcef5db7dfa44438b6028b440391d076',
	        target: 'instafeed',
	        resolution: 'standard_resolution',
	        template: '<div class="col-md-4 col-sm-4"><div class="image-wrapper"><img src="{{image}}"><div class="img-caption"><div class="link"><a href="{{link}}"><i class="fa fa-eye"></i></a></div></div></div></div>',
	        limit: '18'
	    });
	    feed.run();
		</script>
		<div class="row page-title page-title-about">
			<div class="container">
				<h2><i class="fa fa-picture-o"></i>Gallery Ma'had</h2>
			</div>
		</div>
		<div class="row gallery-row">
			<div class="container clear-padding">
				<div class="image-set" id="instafeed">
				</div>
			</div>
		</div>