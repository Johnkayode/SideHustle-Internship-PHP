<?php
    // Major Task -  23rd October 2020

    //Slack Username - @nerdthejohn

    function UserGenerator(){

        //Array of names
        $names = ['Alice','Mofe','Ngozi','Jose','Amira'];
        
        

        //Runs a loop across the array
        foreach ($names as $name) {

            //Checks if the name is lesser than 6
            if (strlen($name)<6){

                //Generates a 3-digit random number
                $rand1 = str_pad(rand(0,999),3,'0', STR_PAD_LEFT);

                //Concatenates the name to the randomly generated number
                $username = $name.$rand1;

                //Checks if the username is greater than 6 and not greater than 8
                if (strlen($username <=8 and strlen($username) > 6)){

                    //Declare headers for password
                    $pass_headers = ['adg','zjq','lsp','ywo','kxi'];

                    //Generate another 3-digit number
                    $rand2 = str_pad(rand(0,999),3,'0', STR_PAD_LEFT);
                    //Generate a number between 0 and 4 to randomly select from the password headers
                    $i = mt_rand(0,4);

                    //Append and Prepend the password headers to the numbers
                    $password = $pass_headers[$i].$rand2.$pass_headers[$i];

                    //Echoes the Username and Password
                    echo 'Username:  <b>'.$username.'</b><br>'.'Password:  <b>'.$password.'</b>';
                    echo '<br><br>';

                }else{
                    echo 'Username must be greater than 6 and not greater than 8';
                };


            }else{
                echo 'Name should be lesser than 6<br>';
                continue;
            };
        };


    };

    //Call the function
    UserGenerator();

?>