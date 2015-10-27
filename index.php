<?php
    require_once './class/ready/Validator.class.php';
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI</title>
		<meta charset = "UTF-8">
	</head>
	<body>
        <?php
            
            $data = [
                'fio' => '1',
                'name' => '1',
                'phone' => '+38(063)7200164'
            ];
            $validator = new Validator();
            
            echo $validator->validate($data,'register')? 'Valid' : 'Un-valid';


        ?>
	</body>
</html>