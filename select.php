<?php
	include_once('header.php');
	$title = "Select a Manufacturer";

	$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
	$manu = $mysql->query('SELECT brand_name FROM dev_marketing_calendar_manufacturer ORDER BY brand_id ASC');

	$manufacturers = [];
	foreach($manu as $m) {
		array_push($manufacturers, $m[0]);
	}

	$manufacturers = array_map('strtolower', $manufacturers);
	$manufacturers = json_encode($manufacturers);

	$products = [];
	$prod = $mysql->query('SELECT * FROM dev_marketing_calendar_product');

	$fflist = ['incipio', 'tavik', 'incase', 'griffin', 'katespade', 'jackspade', 'tumi', 'rebeccaminkoff', 'trinaturk', 'houseofharlow', 'sugarpaper'];

	foreach($prod as $p){
		$ffcombined = '';
		foreach ($fflist as $ff){
			if ($p['form_factors_'.$ff] !== ''){
				if ($ffcombined !== ''){
					$ffcombined .= ', '.$p['form_factors_'.$ff];
				} else {
					$ffcombined .= $p['form_factors_'.$ff];
				}
			}
		}
		array_push($products, array('name'=>strtolower($p['name']), 'id'=>$p['id'], 'brand_id'=>$p['manufacturer'], 'formfactor'=>strtolower($ffcombined)));
	}

	$products = json_encode($products);
?>

<?php if (isset($_COOKIE["submit_success"])){ ?>
	<div class="submitted alert alert-info" role="alert"><? echo $_COOKIE["submit_success"]; ?></div>
	<div class="page-title" style="margin:0 auto !important;">Select a Manufacturer</div>
	<? setcookie("submit_success", $_COOKIE["submit_success"], time()-1);
} else {?>
<div class="page-title">Select a Manufacturer</div>
<? } ?>
<div class="search-menu" style="max-width:470px;width:90%;margin:0 auto;">
	<button class="btn btn-default" id="toggle-search-manufacturer" style="width:49%;">Search Manufacturer</button>
	<button class="btn btn-default" id="toggle-search-formfactor" style="width:50%;">Search Form Factor</button>
</div>
<div class="search-input">
	<input type="text" name="manufacturer" id="search-manufacturer" class="form-control form-input search-submit" placeholder="SEARCH MANUFACTURER"/>
</div>
<div class="search-input">
	<input type="text" name="formfactor" id="search-formfactor" class="form-control form-input search-submit" placeholder="SEARCH FORM FACTOR" style="display:none;"/>
</div>


<div class="manufacturer-list"></div>

<div class="launch-wrap">
	<div class="cal-launch">
		<a href="calendar" class="cal-launch-btn">
			<div class="bottom-nav">
				<i class="fa fa-calendar" aria-hidden="true"></i>
				 <div>Calendar</div>
			</div>
		</a>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	var manufacturers = <?php echo $manufacturers; ?>;
	var products = <?php echo $products; ?>;

	function showAllManufacturers(){
		for (var i = 0; i < manufacturers.length; i++) {
			jQuery('.manufacturer-list').append("<a class='a-manufacturer' href='/dev_marketing_calendar/manufacturer/"+ manufacturers[i] +"'><div class='brand-img'><img src='img/brand_logo/"+ manufacturers[i] +".png'></div></a>");
		}
	}

	jQuery(document).ready(function(){
  		showAllManufacturers();
	});

	jQuery('#search-manufacturer').on('keyup', function(){
		var searchVal = jQuery(this).val().toLowerCase();

		var matches = manufacturers.filter(function(windowValue){
			if(windowValue) {
				return (windowValue.substring(0, searchVal.length) === searchVal);
			}
		});

		var productMatches = products.filter(function(windowValue){
			if('name' in windowValue) {
				return (windowValue.name.substring(0, searchVal.length) === searchVal);
			}
		});

		function showAllMatches(){
			for (var i = 0; i < matches.length; i++) {
				jQuery('.manufacturer-list').append("<a class='a-manufacturer' href='/dev_marketing_calendar/manufacturer/"+ matches[i] +"'><div class='brand-img'><img src='img/brand_logo/"+ matches[i] +".png'></div></a>");
			}
		}
		function showAllProductMatches(){
			for (var i = 0; i < productMatches.length; i++) {
				var name = productMatches[i]['name'];
				var id = productMatches[i]['id'];
				var manu = productMatches[i]['brand_id'];
				jQuery('.manufacturer-list').append("<a class='a-manufacturer prod-match-block' href='/dev_marketing_calendar/product/"+ id +"'><div class='brand-img'>"+ manufacturers[manu-1] + "<br>" + name +"</div></a>");
			}
		}
		//console.log(productMatches);
		if(searchVal.length < 1) {
			jQuery('.manufacturer-list').empty();
			showAllManufacturers();
		} else {
			if(matches.length < 1 && productMatches.length < 1){
				jQuery('.manufacturer-list').empty();
				jQuery('.manufacturer-list').append("<div class='a-manufacturer no-match'>No Matches</div>");
			} else if (matches.length > 0 && productMatches.length < 1){
				jQuery('.manufacturer-list').empty();
				showAllMatches();
			} else if (matches.length < 1 && productMatches.length > 0){
				jQuery('.manufacturer-list').empty();
				showAllProductMatches();
			} else {
				jQuery('.manufacturer-list').empty();
				showAllMatches();
				showAllProductMatches();
			}
		}
	});

	jQuery('#search-formfactor').on('keyup', function(){
		var searchVal = jQuery(this).val().toLowerCase();

		var formfactorMatches = products.filter(function(windowValue){
			if('formfactor' in windowValue) {
				var formfactorExploded = windowValue.formfactor.split(', ');
				for (var i = 0; i<formfactorExploded.length; i++){
					if (formfactorExploded[i].substring(0, searchVal.length) === searchVal){
						return true;
					}
				}
				return false;
			}
		});

		function showAllMatches(){
			for (var i = 0; i < matches.length; i++) {
				jQuery('.manufacturer-list').append("<a class='a-manufacturer' href='/dev_marketing_calendar/manufacturer/"+ matches[i] +"'><div class='brand-img'><img src='img/brand_logo/"+ matches[i] +".png'></div></a>");
			}
		}
		function showAllFormFactorMatches(){
			for (var i = 0; i < formfactorMatches.length; i++) {
				var name = formfactorMatches[i]['name'];
				var id = formfactorMatches[i]['id'];
				var manu = formfactorMatches[i]['brand_id'];
				jQuery('.manufacturer-list').append("<a class='a-manufacturer prod-match-block' href='/dev_marketing_calendar/product/"+ id +"'><div class='brand-img'>"+ manufacturers[manu-1] + "<br>" + name +"</div></a>");
			}
		}
		if(searchVal.length < 1) {
			jQuery('.manufacturer-list').empty();
			showAllManufacturers();
		} else {
			if(formfactorMatches.length < 1){
				jQuery('.manufacturer-list').empty();
				jQuery('.manufacturer-list').append("<div class='a-manufacturer no-match'>No Matches</div>");
			} else {
				jQuery('.manufacturer-list').empty();
				showAllFormFactorMatches();
			}
		}
	});

	jQuery('#toggle-search-manufacturer').click(function(){
		jQuery('#search-formfactor').css({display: "none"});
		jQuery('#search-manufacturer').css({display: "block"});
	});
	jQuery('#toggle-search-formfactor').click(function(){
		jQuery('#search-formfactor').css({display: "block"});
		jQuery('#search-manufacturer').css({display: "none"});
	});
</script>

<?php include_once('footer.php'); ?>