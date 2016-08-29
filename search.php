<?php
$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
$search = $_GET['search'];
if ($search == ''){
	header("Location:http://projects.incipio.com/dev_marketing_calendar/select");
	exit;
}
$search = htmlspecialchars($search);
$query = 'SELECT * FROM dev_marketing_calendar_manufacturer WHERE brand_name LIKE :name';
$stmt = $mysql->prepare($query);
$data = array(
    ':name' => "%".$search."%",
);
$stmt->execute($data);
$results = $stmt->fetchAll();
$str;
$odd = 1;
foreach ($results as $result){
	$str .= implode($result, ',').'/';
}
$url = "http://projects.incipio.com/dev_marketing_calendar/select";
$fields = array(
	'search' => $_GET['search'],
	'results' => $str,
);
$postvars = http_build_query($fields);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
$resut = curl_exec($ch);
curl_close($ch);
//header("Location:http://projects.incipio.com/dev_marketing_calendar/select?search=".$_GET['search']."&results=".$str);
exit;