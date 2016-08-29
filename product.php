<?php
	include_once('header.php');

	$id = $_GET['id'];

	$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
	$query = 'SELECT * FROM dev_marketing_calendar_product WHERE id=:id';
	$stmt = $mysql->prepare($query);
	$data = array(
        ':id' => $id,
    );
	$stmt->execute($data);
	$product = $stmt->fetch();
	$title = $product['name'];

	function getManufacturerName($id, $mysql){
		$query = 'SELECT * FROM dev_marketing_calendar_manufacturer WHERE brand_id=:id';
		$stmt = $mysql->prepare($query);
		$data = array(
	        ':id' => $id,
	    );
		$stmt->execute($data);
		$manufacturer = $stmt->fetch();
		return strtolower($manufacturer['brand_name']);
	}

?>
<div class="print-heading">
	<div class="print-logo">
		<img src="../img/incipio_logo.png">
	</div>
	<div class="print-title">Marketing Product Launch</div>
</div>

<div class="page-title product-title brand-img prod-title-desktop"><img src="../img/brand_logo/<?php echo getManufacturerName($product['manufacturer'], $mysql); ?>.png" data-evernote-hover-show="true"></div>
<div class="page-subtitle" style="margin-top: 10px; width:100%;">
	<div class="page-title product-title print-prod-title"><?php echo getManufacturerName($product['manufacturer'], $mysql); ?></div>
	<div class="product-page-btns">
		<span class="product-subtitle"><?php echo $product['name']; ?></span>
		<?php if (isset($_COOKIE["user_permission"]) && $_COOKIE["user_permission"]==0){ ?>
			<a href="http://projects.incipio.com/dev_marketing_calendar/edit.php?id=<?echo $product['id']?>" class="content-download">
				<i class="fa fa-pencil" aria-hidden="true" style="margin-right:5px;"></i> Edit
			</a>
		<?php } ?>
	</div>
</div>

<div class="details-wrap">
	<div class="details">
		<div class="a-detail">
			<div class="detail-title a-detail-title">Code Name</div>
			<div class="detail-content">
				<?php echo $product['code_name']; ?>
			</div>
		</div>
		<div class="a-detail">
			<div class="detail-title a-detail-title">Marketing Name</div>
			<div class="detail-content">
				<?php echo $product['marketing_name']; ?>
			</div>
		</div>
		<div class="a-detail">
			<div class="detail-title a-detail-title">Launch Date</div>
			<div class="detail-content">
				<?php 
				//$monthnumbers = date("Y - F", mktime(0, 0, 0, $product['launch_date'], 10));
				$months = date("Y - F", strtotime($product['launch_date']));
				echo $months; 
				?>
			</div>
		</div>
		<div class="a-detail">
			<div class="detail-title a-detail-title">Carriers</div>
			<div class="detail-content">
				<?php echo $product['carriers']; ?>
			</div>
		</div>
	</div>
</div>

<div class="details-wrap details-wrap-2">
	<div class="detail-title form-factor-title">Form Factors</div>
	<div class="details">
		<div class="a-detail detail-2" style="padding:15px;">
			<div class="detail-content form-factors-block">
				<?php 
					$brands = ['incipio', 'tavik', 'incase', 'griffin', 'katespade', 'jackspade', 'tumi', 'rebeccaminkoff', 'trinaturk', 'houseofharlow', 'sugarpaper'];

					foreach($brands as $b) {
						if($product['form_factors_'.$b.'']){
							$key = 'upload_'.$b.'';
							$k = $product[$key];
							if(!$k){
								echo '<div class="form-factor-brand">'.ucfirst($b).'</div>';
							}
							else {
								echo '<a target="_blank" class="form-factor-brand" href="http://projects.incipio.com/dev_marketing_calendar/upload/pdfwatermark.php?file='.$k.'&text='.$_COOKIE['user_email'].'">'. ucfirst($b) . '</a>';
							}
							$formFactorsArray = explode(',', $product['form_factors_'.$b.'']);
							
							echo '<ul id="double">';
							foreach($formFactorsArray as $factors){
								echo '<li>' . $factors . '</li>';
							}
							echo '</ul>';
							//echo '<div class="form-factor-content">'. $product['form_factors_'.$b.''] . '</div>';
						}
					}
				?>
			</div>
		</div>
	</div>
</div>

<div class="launch-wrap">
	<div class="cal-launch">
		<a class="cal-launch-btn" href="//projects.incipio.com/dev_marketing_calendar/manufacturer/<?php echo getManufacturerName($product['manufacturer'], $mysql); ?>">
			<div style="margin-top:18px;">
				<div style="margin-bottom:-3px;">Back to</div>
				<div><?php echo getManufacturerName($product['manufacturer'], $mysql); ?></div>
				<i class="fa fa-arrow-left" aria-hidden="true" style="display: block;"></i>
			</div>
		</a>
	</div>
</div>

<?php
	include_once('footer.php');
?>