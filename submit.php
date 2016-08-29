<?
try {
    $mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
    $query_beg = 'INSERT INTO dev_marketing_calendar_product(manufacturer, name, launch_date, code_name, marketing_name, carriers';
    $query_mid = ') VALUES (:manufacturer, :name, :launch_date, :code_name, :marketing_name, :carriers';
    $query_end = ')';

    $data = array(
        ':manufacturer' => $_POST["manufacturer"],
        ':name' => $_POST["name"],
        ':launch_date' => $_POST["launch_date"],
        ':code_name' => $_POST["code_name"],
        ':marketing_name' => $_POST["marketing_name"],
        ':carriers' => $_POST["carriers"],  
    );

    //handle file upload
    $dir = 'upload/';

    // foreach($brands as $b){
    //     if (isset($_FILES['upload_'.ucfirst($b)])){
    //         $path = $dir . basename($_FILES['upload_'.ucfirst($b)]['name']);
    //         move_uploaded_file($_FILES['upload_'.ucfirst($b)]['tmp_name'], $path);
    //         $query_beg .= ', form_factors_'.$b.', upload_'.$b;
    //         $query_mid .= ', :form_factors_'.$b.', :upload_'.$b;
    //         $data[':form_factors_'.$b] = $_POST["form_factors_".ucfirst($b)];
    //         $data[':upload_'.$b] = $_FILES['upload_'.ucfirst($b)]['name'];
    //     }
    // }

    //Incipio upload
    if (isset($_FILES['upload_Incipio'])){
        $path = $dir . basename($_FILES['upload_Incipio']['name']);
        move_uploaded_file($_FILES['upload_Incipio']['tmp_name'], $path);
        $query_beg .= ', form_factors_incipio, upload_incipio';
        $query_mid .= ', :form_factors_incipio, :upload_incipio';
        $data[':form_factors_incipio'] = $_POST["form_factors_Incipio"];
        $data[':upload_incipio'] = $_FILES['upload_Incipio']['name'];
    }

    //Tavik upload
    if (isset($_FILES['upload_Tavik'])){
        $path_tavik = $dir . basename($_FILES['upload_Tavik']['name']);
        move_uploaded_file($_FILES['upload_Tavik']['tmp_name'], $path_tavik);
        $query_beg .= ', form_factors_tavik, upload_tavik';
        $query_mid .= ', :form_factors_tavik, :upload_tavik';
        $data[':form_factors_tavik'] = $_POST["form_factors_Tavik"];
        $data[':upload_tavik'] = $_FILES['upload_Tavik']['name'];
    }

    //Incase Upload
    if (isset($_FILES['upload_Incase'])){
        $path_incase = $dir . basename($_FILES['upload_Incase']['name']);
        move_uploaded_file($_FILES['upload_Incase']['tmp_name'], $path_incase);
        $query_beg .= ', form_factors_incase, upload_incase';
        $query_mid .= ', :form_factors_incase, :upload_incase';
        $data[':form_factors_incase'] = $_POST["form_factors_Incase"];
        $data[':upload_incase'] = $_FILES['upload_Incase']['name'];
    }

    //Griffin Upload
    if (isset($_FILES['upload_Griffin'])){
        $path_griffin = $dir . basename($_FILES['upload_Griffin']['name']);
        move_uploaded_file($_FILES['upload_Griffin']['tmp_name'], $path_griffin);
        $query_beg .= ', form_factors_griffin, upload_griffin';
        $query_mid .= ', :form_factors_griffin, :upload_griffin';
        $data[':form_factors_griffin'] = $_POST["form_factors_Griffin"];
        $data[':upload_griffin'] = $_FILES['upload_Griffin']['name'];
    }

    //Kate Spade Upload
    if (isset($_FILES['upload_Kate_Spade'])){
        $path_katespade = $dir . basename($_FILES['upload_Kate_Spade']['name']);
        move_uploaded_file($_FILES['upload_Kate_Spade']['tmp_name'], $path_katespade);
        $query_beg .= ', form_factors_katespade, upload_katespade';
        $query_mid .= ', :form_factors_katespade, :upload_katespade';
        $data[':form_factors_katespade'] = $_POST["form_factors_Kate_Spade"];
        $data[':upload_katespade'] = $_FILES['upload_Kate_Spade']['name'];
    }

    //Jack Spade Upload
    if (isset($_FILES['upload_Jack_Spade'])){
        $path_jackspade = $dir . basename($_FILES['upload_Jack_Spade']['name']);
        move_uploaded_file($_FILES['upload_Jack_Spade']['tmp_name'], $path_jackspade);
        $query_beg .= ', form_factors_jackspade, upload_jackspade';
        $query_mid .= ', :form_factors_jackspade, :upload_jackspade';
        $data[':form_factors_jackspade'] = $_POST["form_factors_Jack_Spade"];
        $data[':upload_jackspade'] = $_FILES['upload_Jack_Spade']['name'];
    }

    //Tumi Upload
    if (isset($_FILES['upload_Tumi'])){
        $path_tumi = $dir . basename($_FILES['upload_Tumi']['name']);
        move_uploaded_file($_FILES['upload_Tumi']['tmp_name'], $path_tumi);
        $query_beg .= ', form_factors_tumi, upload_tumi';
        $query_mid .= ', :form_factors_tumi, :upload_tumi';
        $data[':form_factors_tumi'] = $_POST["form_factors_Tumi"];
        $data[':upload_tumi'] = $_FILES['upload_Tumi']['name'];
    }

    //Rebecca Minkoff
    if (isset($_FILES['upload_Rebecca_Minkoff'])){
        $path_rebeccaminkoff = $dir . basename($_FILES['upload_Rebecca_Minkoff']['name']);
        move_uploaded_file($_FILES['upload_Rebecca_Minkoff']['tmp_name'], $path_rebeccaminkoff);
        $query_beg .= ', form_factors_rebeccaminkoff, upload_rebeccaminkoff';
        $query_mid .= ', :form_factors_rebeccaminkoff, :upload_rebeccaminkoff';
        $data[':form_factors_rebeccaminkoff'] = $_POST["form_factors_Rebecca_Minkoff"];
        $data[':upload_rebeccaminkoff'] = $_FILES['upload_Rebecca_Minkoff']['name'];
    }

    //Trina Turk
    if (isset($_FILES['upload_Trina_Turk'])){
        $path_trinaturk = $dir . basename($_FILES['upload_Trina_Turk']['name']);
        move_uploaded_file($_FILES['upload_Trina_Turk']['tmp_name'], $path_trinaturk);
        $query_beg .= ', form_factors_trinaturk, upload_trinaturk';
        $query_mid .= ', :form_factors_trinaturk, :upload_trinaturk';
        $data[':form_factors_trinaturk'] = $_POST["form_factors_Trina_Turk"];
        $data[':upload_trinaturk'] = $_FILES['upload_Trina_Turk']['name'];
    }

    //House Of Harlow upload
    if (isset($_FILES['upload_House_of_Harlow'])){
        $path_houseofharlow = $dir . basename($_FILES['upload_House_of_Harlow']['name']);
        move_uploaded_file($_FILES['upload_House_of_Harlow']['tmp_name'], $path_houseofharlow);
        $query_beg .= ', form_factors_houseofharlow, upload_houseofharlow';
        $query_mid .= ', :form_factors_houseofharlow, :upload_houseofharlow';
        $data[':form_factors_houseofharlow'] = $_POST["form_factors_House_of_Harlow"];
        $data[':upload_houseofharlow'] = $_FILES['upload_House_of_Harlow']['name'];
    }

    //Sugar paper upload
    if (isset($_FILES['upload_Sugar_Paper'])){
        $path_sugarpaper = $dir . basename($_FILES['upload_Sugar_Paper']['name']);
        move_uploaded_file($_FILES['upload_Sugar_Paper']['tmp_name'], $path_sugarpaper);  
        $query_beg .= ', form_factors_sugarpaper, upload_sugarpaper';
        $query_mid .= ', :form_factors_sugarpaper, :upload_sugarpaper';
        $data[':form_factors_sugarpaper'] = $_POST["form_factors_Sugar_Paper"];
        $data[':upload_sugarpaper'] = $_FILES['upload_Sugar_Paper']['name'];
    }

    $query = $query_beg . $query_mid . $query_end;

    $stmt = $mysql->prepare($query);
    $stmt->execute($data);
    setcookie("submit_success", "Submitted Successfully", time()+1800);
    header("Location:http://projects.incipio.com/dev_marketing_calendar/select");
} catch (PDOException $e){
    print "Error: " . $e->getMessage();
    die();
}