<?php
	include_once('header.php');

	$name = $_GET['name'];

	$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
	$query = 'SELECT * FROM dev_marketing_calendar_manufacturer WHERE brand_name=:name';
	$stmt = $mysql->prepare($query);
	$data = array(
        ':name' => $name,
    );
	$stmt->execute($data);
	$manufacturer = $stmt->fetch();

	if (empty($manufacturer)){
		header("Location:http://projects.incipio.com/dev_marketing_calendar/select");
	}

	$title = $manufacturer['brand_name'];
?>

<?php
	
function displaymonths($monthdata){
	global $mysql;
	global $manufacturer;
	$query = 'SELECT * FROM dev_marketing_calendar_product WHERE manufacturer=:id';
	$stmt = $mysql->prepare($query);
	$data = array(
        ':id' => $manufacturer['brand_id'],
    );
	$stmt->execute($data);
	$products= $stmt->fetchAll();
	$months = date("Y-F", strtotime($monthdata));
	$monthnumbers = date('Y-m', strtotime($months));

	$html = '<div class="month-header">
		<div class="month-mask"></div>
		<div class="month-title">
			<div style="text-align:center;">
				<div style="margin-bottom:-5px;">' .substr($months,5,3) .'</div>
				<div class="month-year">'. substr($months,0,4) .'</div>
			</div>
		</div>
	</div>
	<div class="month-items">';
	foreach ($products as $row) {
			if($monthnumbers == $row['launch_date']) {
	$html .= '<a class="month-item" href="/dev_marketing_calendar/product/' . $row['id'] .'">';
	$html .= '<div>'.$row['name'].'</div> </a>';
		}
		}
	$html .= '</div>';
	return $html;
}

$presentmonth = "0";
function nextquarter($presentmonth){
	global $mysql;
	global $manufacturer;
	$html = '<div class="months-wrap">
			<div class="the-months months-top">
			<div class="a-month">';
	$html .= displaymonths($presentmonth ."months");
	$html .= '</div> <div class="a-month">';
	$html .= displaymonths(++$presentmonth ."months");
	$html .='</div> <div class="a-month">';
	$html .= displaymonths(++$presentmonth ."months");
	$html .= '</div> </div> </div>';
	return $html;
	 echo $html;
	 exit;
}

function prevquarter($presentmonth){
	$presentmonth -= 2;
	$html = '<div class="months-wrap">
			<div class="the-months months-top">
			<div class="a-month">';
	$html .= displaymonths($presentmonth ."months");
	$html .= '</div> <div class="a-month">';
	$html .= displaymonths(++$presentmonth ."months");
	$html .='</div> <div class="a-month">';
	$html .= displaymonths(++$presentmonth ."months");
	$html .= '</div> </div> </div>';
	return $html;
	 echo $html;
	 exit;
}
?>
<?php 

$months = array();
for($presentmonth = -16; $presentmonth <= -1; $presentmonth += 3){
$months[] = prevquarter($presentmonth); 
}

for($presentmonth = 0; $presentmonth <= 16; $presentmonth += 3){
$months[] = nextquarter($presentmonth); 
}
//print_r($months);
?>
<script type="text/javascript">
var index = 6;
var jArray= <?php echo json_encode($months); ?>;
function quarter(index){

		document.getElementById('months-display').innerHTML = jArray[index];
		document.getElementById('nxt').style.visibility = "visible";
		document.getElementById('prev').style.visibility = "visible";
		equalHeight($(".a-month"));
		if(index <= 0){
			document.getElementById('prev').style.visibility = "hidden";
			document.getElementById('nxt').style.visibility = "visible";
		}
		else if(index >= 11){
			document.getElementById('prev').style.visibility = "visible";
			document.getElementById('nxt').style.visibility = "hidden";

		}
} 
function equalHeight(group) {
    if($(window).width() > 564){
    tallest = 0;
    group.each(function() {
        thisHeight = $(this).height();
        if(thisHeight > tallest) {
            tallest = thisHeight;
        }
    });
    group.height(tallest);
	}
}
window.onload = function() {
  document.getElementById('months-display').innerHTML = jArray[6];
  equalHeight($(".a-month"));
};
$(window).resize(function() {
  equalHeight($(".a-month"));
});
</script>
<div class="page-title product-title brand-img"><img src="../img/brand_logo/<?=strtolower($manufacturer['brand_name'])?>.png" data-evernote-hover-show="true"></div>
<div id="months-display">

</div>
<div class="launch-wrap">
	<div class="cal-launch">
		<a class="cal-launch-btn" href="//projects.incipio.com/dev_marketing_calendar/select">
			<div class="bottom-nav-back">
				<i class="fa fa-arrow-left" aria-hidden="true" style="display: block; margin-bottom: 7px;"></i>
				<div>Back</div>
			</div>
		</a>
	</div>
</div>

<div class="prev-next-fixed">
	<div class="prev-next-wrap">
		<div class="prev-months" id="prev" onclick="quarter(--index);">
			<i class="fa fa-angle-double-left" aria-hidden="true" style="font-size:20pt; margin-right: 10px;"></i> Prev <div class="quarter" style="margin-left:5px !important;">Quarter</div>
		</div>
		<div class="next-months" id="nxt" onclick="quarter(++index);">
			Next <div class="quarter" style="margin-left:5px !important;">Quarter</div><i class="fa fa-angle-double-right" aria-hidden="true" style="font-size:20pt; margin-left: 10px;"></i>
		</div>
	</div>
</div>

<?php
	include_once('footer.php');
?>