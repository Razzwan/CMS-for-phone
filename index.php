<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/mvc/Router.class.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/ready/Validator.class.php';
 ?>

        <?php
            
            $data = [
                'fio' => '1',
                'name' => '1',
                'phone' => '+38(063)200164'
            ];
            
			$validator = new Validator();
			$time = microtime(1);
			for($i = 0 ; $i < 100000 ; $i++ )
				echo ($result = $validator->arrayValidator($data,'register')[0]) ? 'Valid' : $result[1];
			
			echo '<br> Time:'.(microtime(1)-$time);
			echo '<br> Memory usage: '.memory_get_usage()/1024/1024 .' Mb'; 

        ?>
