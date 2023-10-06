
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table</title>
   
    <style>
        table,tr,th,td
        {
            text-align: center;
            border: 2px solid ;
            padding: 5px;
        }
        body
        {
            font-family: Arial;
        }
    </style>
</head>
<body>
    <div class="grades-table">

<table style="border-collapse: collapse;" width="100%">
    <thead>
        <tr>
           
            <th colspan="3"><span style="font-size: 20px;position: relative;top: 26px;left: 118px;">RainbowFish Art Grade</span><img src="https://rainbowfishportfolio.com/assets/images/logo/rainbowfish-logo1x.png" width="200px" style="float: right;margin-right: 4px;"></th>
        </tr>
          <tr>
            <th colspan="3 "><h3>First Term - Class 1A (2020 - 2021)</h3></th>
          
        </tr>
        <tr>
            <th>Sl.No </th>
            <th>NAME</th>
            <th>GRADE</th>
          
        </tr>
    </thead>
    <tbody>
	
	
	<?php if(!empty($list_data)){
		$i=1;
		foreach($list_data as $data){
		?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $data->first_name.' '.$data->last_name ?></td>
            <td><?= $data->grade_name ?></td>
        </tr>
	<?php $i++;
	}
	}	?>
    </tbody>
</table>
</div>

</body>
</html>