<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = mysqli_connect("192.9.19.1", "nenden", "20681", "ocsweb") or die("Connection Error: " . mysqli_error($conn)); 



$SQL = "SELECT softwares.id as sfw_id, hardware.name as hdw_name,softwares.name as Software_Name,softwares.version as version
                    FROM softwares     inner join hardware on softwares.hardware_id=hardware.id
                where softwares.name like 'microsoft office%' or softwares.name like 'accpac%' or softwares.name like '%cad%'
                or softwares.name like 'autodesk%' or softwares.name like 'mediapt cad/w%' or softwares.name like 'microsoft window%' or softwares.name like 'active%'  or softwares.name like '%delphi%'
                or softwares.name like '%brio%' or softwares.name like '%vista%'"; 
/*$SQL = "SELECT softwares.id as sfw_id, hardware.name as hdw_name,softwares.name as Software_Name,softwares.version as version
                    FROM softwares     inner join hardware on softwares.hardware_id=hardware.id where softwares.name like '%OMRON%'";
*/


$result1 = mysqli_query($conn, $SQL ) or die("Couldn't execute query.".mysqli_error($conn)); 
//echo '123';

$i=0;
while($row = mysqli_fetch_array($result1)) {   
	$responce->rows[$i]['ID']=$row['sfw_id'];
	$responce->rows[$i]['cell']=array($row['sfw_id'],$row['hdw_name'],utf8_encode($row['Software_Name']),$row['version']);
//        $data=array($row['sfw_id'],$row['hdw_name'],utf8_encode($row['Software_Name']),$row['version']);
        //var_dump($data);
	$i++;
}

//var_dump(json_encode($responce));



echo json_encode($responce);
//echo json_encode($result1);

?>
