<?php
    //Numeric Arrays

    $food = array('Rice','Beans','Yam');
    //Outputs Yam
    echo $food[2];
    echo '<br>';

    //Associative Arrays

    $age = array('Seun'=> 18,
                    'Ngozi'=>20,
                    'Ahmed'=>18,
                    'Thomas'=> 21,
                    'Gabrielle'=>17
                );
    //outputs Ahmed's age
    echo $age['Ahmed'];
    echo '<br>';



    //Multi-dimensional Arrays

    $languages = array('Python' => array(
        'Web'=> array(
            'Flask','Django','Bottle'
        ),
        'DS'=>array(
            'Pandas','NumPy','Matplotlib'
        ),
        'GUI'=> array(
            'Tkinter','Kivy'
        ) 
    ),'PHP'=> 'Laravel'
    ,'Javascript' => array(
        'ReactJs','NodeJs', 'VueJS'
    ));
    //Outputs Django
    echo $languages['Python']['Web'][1];
    echo '<br>';
    //Outputs Laravel
    echo $languages['PHP'];
    echo '<br>';
    //Outputs ReactJs
    echo $languages['Javascript'][0]
    
?>