<?php
	include_once('header.php');

	$id = $_GET['id'];
	$brands = ['incipio', 'tavik', 'incase', 'griffin', 'katespade', 'jackspade', 'tumi', 'rebeccaminkoff', 'trinaturk', 'houseofharlow', 'sugarpaper'];
	$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
	$query = 'SELECT * FROM dev_marketing_calendar_product INNER JOIN dev_marketing_calendar_manufacturer ON dev_marketing_calendar_product.manufacturer = dev_marketing_calendar_manufacturer.brand_id WHERE id=:id';
	$stmt = $mysql->prepare($query);
	$data = array(
        ':id' => $id,
    );
	$stmt->execute($data);
	$product = $stmt->fetch();

	$launch_date = $product['launch_date'];
	$brand_id = $product['brand_id'];

	if(isset($_POST['submit']))
	{
	 	try{
	 		$id = $_GET['id'];
			$query_beg = 'UPDATE dev_marketing_calendar_product set manufacturer = :manufacturer, name = :name, launch_date = :launch_date, code_name = :code_name, marketing_name = :marketing_name, carriers = :carriers';
			$query_end = ' Where id = :id';
		    $data = array(
		    	':manufacturer' => $_POST['manufacturer'],
	          	':name' => $_POST["name"],
	       		':launch_date' => $_POST["launch_date"],
	    		':code_name' => $_POST["code_name"],
	    		':marketing_name' => $_POST["marketing_name"],
	    		':carriers' => $_POST["carriers"],
	      	);

	    	$dir = 'upload/';    

	    	if($_FILES['upload_Incipio']['name'] != ''){
	    		$path = $dir . basename($_FILES['upload_Incipio']['name']);
        		move_uploaded_file($_FILES['upload_Incipio']['tmp_name'], $path);
		        $query_beg .= ', upload_incipio = :upload_incipio';
		        $data[':upload_incipio'] = $_FILES['upload_Incipio']['name'];
	    	}
	    	if(isset($_POST['form_factors_Incipio'])){
	    		$query_beg .= ', form_factors_incipio = :form_factors_incipio';
	    		$data[':form_factors_incipio'] = $_POST['form_factors_Incipio'];
	    	}
	    	if($_FILES['upload_Tavik']['name'] != ''){
	    		$path_tavik = $dir . basename($_FILES['upload_Tavik']['name']);
        		move_uploaded_file($_FILES['upload_Tavik']['tmp_name'], $path_tavik);
		        $query_beg .= ', upload_tavik = :upload_tavik';
		        $data[':upload_tavik'] = $_FILES['upload_Tavik']['name'];
	    	}
	    	if(isset($_POST['form_factors_Tavik'])){
	    		$query_beg .= ', form_factors_tavik = :form_factors_tavik';
	    		$data[':form_factors_tavik'] = $_POST['form_factors_Tavik'];
	    	}
	    	if($_FILES['upload_Incase']['name'] != ''){
	    		$path_incase = $dir . basename($_FILES['upload_Incase']['name']);
        		move_uploaded_file($_FILES['upload_Incase']['tmp_name'], $path_incase);
		        $query_beg .= ', upload_incase = :upload_incase';
		        $data[':upload_incase'] = $_FILES['upload_Incase']['name'];
	    	}
	    	if(isset($_POST['form_factors_Incase'])){
	    		$query_beg .= ', form_factors_incase = :form_factors_incase';
	    		$data[':form_factors_incase'] = $_POST['form_factors_Incase'];
	    	}
	    	if($_FILES['upload_Griffin']['name'] != ''){
	    		$path_griffin = $dir . basename($_FILES['upload_Griffin']['name']);
        		move_uploaded_file($_FILES['upload_Griffin']['tmp_name'], $path_griffin);
		        $query_beg .= ', upload_griffin = :upload_griffin';
		        $data[':upload_griffin'] = $_FILES['upload_Griffin']['name'];
	    	}
	    	if(isset($_POST['form_factors_Griffin'])){
	    		$query_beg .= ', form_factors_griffin = :form_factors_griffin';
	    		$data[':form_factors_griffin'] = $_POST['form_factors_Griffin'];
	    	}
	    	if($_FILES['upload_Kate_Spade']['name'] != ''){
	    		$path_katespade = $dir . basename($_FILES['upload_Kate_Spade']['name']);
        		move_uploaded_file($_FILES['upload_Kate_Spade']['tmp_name'], $path_katespade);
		        $query_beg .= ', upload_katespade = :upload_katespade';
		        $data[':upload_katespade'] = $_FILES['upload_Kate_Spade']['name'];
	    	}
	    	if(isset($_POST['form_factors_Kate_Spade'])){
	    		$query_beg .= ', form_factors_katespade = :form_factors_katespade';
	    		$data[':form_factors_katespade'] = $_POST['form_factors_Kate_Spade'];
	    	}
	    	if($_FILES['upload_Jack_Spade']['name'] != ''){
	    		$path_jackspade = $dir . basename($_FILES['upload_Jack_Spade']['name']);
        		move_uploaded_file($_FILES['upload_Jack_Spade']['tmp_name'], $path_jackspade);
		        $query_beg .= ', upload_jackspade = :upload_jackspade';
		        $data[':upload_jackspade'] = $_FILES['upload_Jack_Spade']['name'];
	    	}
	    	if(isset($_POST['form_factors_Jack_Spade'])){
	    		$query_beg .= ', form_factors_jackspade = :form_factors_jackspade';
	    		$data[':form_factors_jackspade'] = $_POST['form_factors_Jack_Spade'];
	    	}
	    	if($_FILES['upload_Tumi']['name'] != ''){
	    		$path_tumi = $dir . basename($_FILES['upload_Tumi']['name']);
        		move_uploaded_file($_FILES['upload_Tumi']['tmp_name'], $path_tumi);
		        $query_beg .= ', upload_tumi = :upload_tumi';
		        $data[':upload_tumi'] = $_FILES['upload_Tumi']['name'];
	    	}
	    	if(isset($_POST['form_factors_Tumi'])){
	    		$query_beg .= ', form_factors_tumi = :form_factors_tumi';
	    		$data[':form_factors_tumi'] = $_POST['form_factors_Tumi'];
	    	}
	    	if($_FILES['upload_Rebecca_Minkoff']['name'] != ''){
	    		$path_rebeccaminkoff = $dir . basename($_FILES['upload_Rebecca_Minkoff']['name']);
        		move_uploaded_file($_FILES['upload_Rebecca_Minkoff']['tmp_name'], $path_rebeccaminkoff);
		        $query_beg .= ', upload_rebeccaminkoff = :upload_rebeccaminkoff';
		        $data[':upload_rebeccaminkoff'] = $_FILES['upload_Rebecca_Minkoff']['name'];
	    	}
	    	if(isset($_POST['form_factors_Rebecca_Minkoff'])){
	    		$query_beg .= ', form_factors_rebeccaminkoff = :form_factors_rebeccaminkoff';
	    		$data[':form_factors_rebeccaminkoff'] = $_POST['form_factors_Rebecca_Minkoff'];
	    	}
	    	if($_FILES['upload_Trina_Turk']['name'] != ''){
	    		$path_trinaturk = $dir . basename($_FILES['upload_Trina_Turk']['name']);
        		move_uploaded_file($_FILES['upload_Trina_Turk']['tmp_name'], $path_trinaturk);
		        $query_beg .= ', upload_trinaturk = :upload_trinaturk';
		        $data[':upload_trinaturk'] = $_FILES['upload_Trina_Turk']['name'];
	    	}
	    	if(isset($_POST['form_factors_Trina_Turk'])){
	    		$query_beg .= ', form_factors_trinaturk = :form_factors_trinaturk';
	    		$data[':form_factors_trinaturk'] = $_POST['form_factors_Trina_Turk'];
	    	}
	    	if($_FILES['upload_House_of_Harlow']['name'] != ''){
	    		$path_houseofharlow = $dir . basename($_FILES['upload_House_of_Harlow']['name']);
        		move_uploaded_file($_FILES['upload_House_of_Harlow']['tmp_name'], $path_houseofharlow);
		        $query_beg .= ', upload_houseofharlow = :upload_houseofharlow';
		        $data[':upload_houseofharlow'] = $_FILES['upload_House_of_Harlow']['name'];
	    	}
	    	if(isset($_POST['form_factors_House_of_Harlow'])){
	    		$query_beg .= ', form_factors_houseofharlow = :form_factors_houseofharlow';
	    		$data[':form_factors_houseofharlow'] = $_POST['form_factors_House_of_Harlow'];
	    	}
	    	if($_FILES['upload_Sugar_Paper']['name'] != ''){
	    		$path_sugarpaper = $dir . basename($_FILES['upload_Sugar_Paper']['name']);
        		move_uploaded_file($_FILES['upload_Sugar_Paper']['tmp_name'], $path_sugarpaper);
		        $query_beg .= ', upload_sugarpaper = :upload_sugarpaper';
		        $data[':upload_sugarpaper'] = $_FILES['upload_Sugar_Paper']['name'];
	    	}
	    	if(isset($_POST['form_factors_Sugar_Paper'])){
	    		$query_beg .= ', form_factors_sugarpaper = :form_factors_sugarpaper';
	    		$data[':form_factors_sugarpaper'] = $_POST['form_factors_Sugar_Paper'];
	    	}

	    	
	    	$data[':id'] = $id;
	    	$query = $query_beg . $query_end;

		 	$stmt = $mysql->prepare($query);
    		$stmt->execute($data);
    		$url = "http://projects.incipio.com/dev_marketing_calendar/product/".$id;
    		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
			//header("Location:http://projects.incipio.com/dev_marketing_calendar/product/".$id);
		}
		catch (PDOException $e){
			print "Error: " . $e->getMessage();
			die();
		}
	}

?>

<div class="page-title">Edit Product</div>
<div class="submit-form">
	<form role="form" action="#" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<select class="form-control" name="manufacturer" id="manufacturer" required>
				<option value="">Select Manufacturer</option>
				<? $manuf = db('SELECT brand_id, brand_name FROM dev_marketing_calendar_manufacturer ORDER BY priority ASC');
				foreach($manuf as $m){ 
				global $brand_id; ?>
				<option value="<?=$m['brand_id']?>" <?php if ($brand_id == $m['brand_id'])  echo 'selected = "selected"'; ?> ><?=$m['brand_name']?></option>
				<? } ?>
			</select>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="name" placeholder="Product Name" value="<?php echo $product['name']; ?>" required>
		</div>
		<!-- <div class="form-factor-block">
			<div class="form-group form-factor-select-wrap">
				<select class="form-control form-factor-brand" id="form-factor-brand" required>
					<option name="form_factor_Incipio" value="form_factor_Incipio" selected>Incipio</option>
				</select>
				<input type="text" class="form-control form-factor-input" name="form_factors_Incipio" placeholder="Form Factors" value="<?php //echo $product['form_factors_incipio']; ?>" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="MAX_FILE_SIZE" value="500000">
				<input type="file" accept="application/pdf" name="upload_Incipio" value="<?php //echo $product['upload_incipio']; ?>">
			</div>
		</div> -->
		<?php 
			foreach($brands as $b) {
						if($product['form_factors_'.$b.'']){
							if ($b == 'jackspade'){
								$key = 'upload_Jack_Spade';
								$name = 'form_factors_Jack_Spade';
							} else if ($b == 'katespade'){
								$key = 'upload_Kate_Spade';
								$name = 'form_factors_Kate_Spade';
							} else if ($b == 'rebeccaminkoff'){
								$key = 'upload_Rebecca_Minkoff';
								$name = 'form_factors_Rebecca_Minkoff';
							} else if ($b == 'trinaturk'){
								$key = 'upload_Trina_Turk';
								$name = 'form_factors_Trina_Turk';
							} else if ($b == 'houseofharlow'){
								$key = 'upload_House_of_Harlow';
								$name = 'form_factors_House_of_Harlow';
							} else if ($b == 'sugarpaper'){
								$key = 'upload_Sugar_Paper';
								$name = 'form_factors_Sugar_Paper';
							} else {
								$key = 'upload_'.ucfirst($b).'';
								$name = 'form_factors_'.ucfirst($b).'';
							}
							$k = $product[$key];
								echo '<div class="form-factor-block"><div class="form-group form-factor-select-wrap-edit"><div class="form-factor-brand">'.ucfirst($b).'</div><input type="text" class="form-control form-factor-input" name="'. $name .'" placeholder="Form Factors" value="'. $product['form_factors_'.$b.''] . '" required>';
								echo '<div class="form-group" style="margin-top:5px;"><a href="http://projects.incipio.com/dev_marketing_calendar/upload/pdfwatermark.php?file='.$product['upload_'.$b].'&text='.$_COOKIE['user_email'].'" style="color:#333;padding-left:5px;">'.$product['upload_'.$b].'</a><input type="file" accept="application/pdf" name="'. $key .'"></div></div></div>';
						}
					}
		?>
		<div class="add-block"></div>
		<div class="form-group add-opt-field">
			<i class="fa fa-plus" aria-hidden="true" style="margin-right:5px;"></i> Add form factors
		</div>
		<!-- <div class="form-group">
			<input type="text" class="form-control" name="form_factors" placeholder="Form Factors" value="<?php //echo $product['form_factors_incipio']; ?>" required>
		</div> -->
		<div class="form-group">
			<input type="text" class="form-control" name="code_name" placeholder="Code Name" value="<?php echo $product['code_name']; ?>" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="marketing_name" placeholder="Marketing Name" value="<?php echo $product['marketing_name']; ?>" required>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="carriers" placeholder="Carriers" value="<?php echo $product['carriers']; ?>" required>
		</div>
		<div class="form-group">
			<input type="month" class="form-control" name="launch_date" id="launch_date" value="<?php echo $launch_date; ?>" required>
		</div>
		<button type="submit" name="submit" class="btn btn-default submit-form-btn">SAVE</button>
	</form>
</div>

<div class="launch-wrap">
	<div class="cal-launch">
		<a class="cal-launch-btn" href="http://projects.incipio.com/dev_marketing_calendar/product/<?php echo $id; ?>">
			<div class="bottom-nav-back">
				<i class="fa fa-arrow-left" aria-hidden="true" style="display: block; margin-bottom: 7px;"></i>
				<div>Back</div>
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