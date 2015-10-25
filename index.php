<?php
    require_once './class/ready/universalValidator.class.php';
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>HI</title>
		<meta charset = "UTF-8">
	</head>
	<body>
        <?php
            $validation = [
                'name' => function($data){
                    if(!is_string($data))
                        return false;
                    return true;
                }
            ];
            $data = [
                'name' => 'hi'
            ];
            if(universalValidator::universalValidatorOfArray($data, $validation))
                echo 'valid';
            else echo 'Unvalid';
        ?>
	</body>
</html>