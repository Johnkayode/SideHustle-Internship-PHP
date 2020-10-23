<?php
    echo '<h2>Generate Glo Phone Numbers</h2>';
    echo '<br>';
    
    if (isset($_POST['btn']) and !empty($_POST['number'])) {
        $number = $_POST['number'];
        $button = $_POST['btn'];
       
        if ($number > 0 ) {
            for ($i=1; $i <= $number ; $i++) { 
                $rand = str_pad(rand(0,9999999),7,'0', STR_PAD_LEFT);
                
                $glo = ['0805','0705','0905','0807','0815','0811','0905'];

                $rand_ = rand(0,6);

                $phone_number = $glo[$rand_].$rand;
                echo $i.".\t\t\t".$phone_number.'<br>';

            };
        }else{
            echo 'Number should be a positive integer';
        };
    }else{
        echo 'Type in a positive integer<br>';
        };


?>




<form method='POST' action=''>
    <br>
    <input type='number' placeholder='Enter Number' name="number" required>
    <br>
    <br>
    <input type='submit' value='Generate Phone Numbers' name="btn">
</form>