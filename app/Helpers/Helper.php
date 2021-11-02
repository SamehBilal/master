<?php

    /* Active Status */
    function set_active($path, $active = 'active')
    {
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }

    /* First two letters */
    function initials($fullname)
    {
        //The strtoupper() function converts a string to uppercase.
        $name  = strtoupper($fullname);
        //prefixes that needs to be removed from the name
        $remove = ['.', 'MRS', 'MISS', 'MS', 'MASTER', 'DR', 'MR'];
        $nameWithoutPrefix=str_replace($remove," ",$name);

        $words = explode(" ", $nameWithoutPrefix);

        //this will give you the first word of the $words array , which is the first name
        $firtsName = reset($words);

        //this will give you the last word of the $words array , which is the last name
        $lastName  = end($words);

        echo substr($firtsName,0,1); // this will echo the first letter of your first name
        echo substr($lastName ,0,1); // this will echo the first letter of your last name
    }

    /* Random Color*/
    function random_color()
    {
        $colors = [
            'success','info','accent','warning','danger','dark','primary','secondary'
        ];

        echo $colors[array_rand($colors)];
    }
?>
