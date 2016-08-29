<?php 
	include_once('header.php');
	$title = "Incipio Marketing Calendar Submission Form";

	$brands = [
		'Tavik', 'Incase', 'Griffin', 'Kate Spade', 'Jack Spade', 'Tumi', 'Rebecca Minkoff', 'Trina Turk', 'House of Harlow', 'Sugar Paper'
	];
?>

<div class="page-title">New product launch</div>

<div class="submit-form">
	<form role="form" action="submit.php" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<select class="form-control" name="manufacturer" id="manufacturer" required>
				<option value="">Select Manufacturer</option>
				<?php $manuf = db('SELECT brand_id, brand_name FROM dev_marketing_calendar_manufacturer ORDER BY priority ASC');
				foreach($manuf as $m){ ?>
				<option value="<?=$m['brand_id']?>"><?=$m['brand_name']?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="name" placeholder="Product Name" required>
		</div>
		<div class="form-factor-block">
			<div class="form-group form-factor-select-wrap-edit">
				<select class="form-control form-factor-brand" id="form-factor-brand" required>
					<option name="form_factor_Incipio" value="form_factor_Incipio" selected>Incipio</option>
				</select>
				<input type="text" class="form-control form-factor-input" name="form_factors_Incipio" placeholder="Form Factors" required>
				<div class="form-group" style="margin-top:5px;">
					<input type="file" accept="application/pdf" name="upload_Incipio">
				</div>
			</div>
		</div>
		<div class="add-block"></div>
		<div class="form-group add-opt-field">
			<i class="fa fa-plus" aria-hidden="true" style="margin-right:5px;"></i> Add form factors
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="code_name" placeholder="Code Name" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="marketing_name" placeholder="Marketing Name" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="carriers" placeholder="Carriers" required>
		</div>
		<div class="form-group">
		<!-- 	<select class="form-control" name="launch_date" id="launch_date" required>
				<option value="">Select Launch Date</option>
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select> -->
			<input type="month" class="form-control" name="launch_date" id="launch_date" required>
		</div>
		<button type="submit" class="btn btn-default submit-form-btn">Submit</button>
	</form>
</div>

<div class="launch-wrap">
	<div class="cal-launch">
		<a class="cal-launch-btn" href="//projects.incipio.com/dev_marketing_calendar/select">
			<div class="bottom-nav-home">
				<i class="fa fa-home" aria-hidden="true"></i>
				 <div style="margin-top:-5px;">Home</div>
			</div>
		</a>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	jQuery(document).ready(function(){

		var brands, block, content, select, items = [], item;

		brands = ['Tavik', 'Incase', 'Griffin', 'Kate Spade', 'Jack Spade', 'Tumi', 'Rebecca Minkoff', 'Trina Turk', 'House of Harlow', 'Sugar Paper'];

		// Builds options for select
		for (var i = 0; i < brands.length; i++) {
			var us = brands[i].replace(" ","_");
			var usName = us.replace(" ","_");
			item = '<option name="form_factor_'+usName+'" value="form_factor_'+usName+'">'+brands[i]+'</option>';
			items.push(item);
		}

		function addBlock() {

			// Builds new block when button is clicked
			block = jQuery('.add-block');
			select = jQuery('.form-factor-brand');
			content = 	'<div class="form-factor-block">'+
							'<div class="form-group opt-field form-factor-select-wrap-edit">'+
								'<div class="form-brand-wrap"><select class="form-control form-factor-brand" id="form_factor_brand"><option>Brand</option>'+items+'</select><div class="remove-field"><i class="fa fa-times" aria-hidden="true"></i></div></div>'+
								'<input type="text" class="form-control form-factor-input" name="" placeholder="Form Factors">'+
								'<div class="form-group upload-wrap" style="margin-top:5px;">'+
									'<input type="file" accept="application/pdf" name="" class="upload-item">'+
								'</div>'+
							'</div>'+
						'</div>';
			block.append(content);

			jQuery('.form-factor-brand').change(function(){
				var val, item;
				item = jQuery(this);
				val = item.val();
				jQuery(this).parents('.form-brand-wrap').parents('.opt-field').children('.upload-wrap').children('.upload-item').attr('name','upload_'+val.replace("form_factor_",""));
				jQuery(this).parents('.form-brand-wrap').siblings('.form-factor-input').attr('name','form_factors_'+val.replace("form_factor_",""));
			});

			jQuery('.opt-field').on('mouseenter', function(){
				jQuery(this).children('.remove-field').addClass('remove-field-active');
			});

			jQuery('.remove-field').on('click', function(){
				jQuery(this).parents('.opt-field').parents('.form-factor-block').remove();
			});

			jQuery('.opt-field').on('mouseleave', function(){
				jQuery(this).children('.remove-field').removeClass('remove-field-active');
			});

		}

		jQuery('.add-opt-field').on('click', function(){
			addBlock();
		});

	});
</script>

<?php include_once('footer.php'); ?>
<?php
function db($query){
	try {
		$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
		$dump = $mysql->query($query);
		return $dump;
	} catch (PDOException $e){
		print "Error: " . $e->getMessage();
		die();
	}
}
?>