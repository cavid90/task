<?php
/**
 * Function which converts binary to text
 */
if( !function_exists( 'bin2text' ) )
{
    function bin2text( $bin )
    {
        # get array of binary - letters
        $chars = explode( "\n", chunk_split( str_replace( " ", '', $bin ), 8 ) );
        $char_count = count( $chars );

        # converting the characters one by one
        $text = '';
        for( $i = 0; $i < $char_count; $text .= chr( bindec( $chars[$i] ) ), $i++ );

        # Return the result as text
        return $text;

    }
}

/**
 * Function for getting configuration data from configuration file
 */
if(!function_exists('config')) {
    function config($key, $file = 'app')
    {
        $array = include BASE_PATH . '/config/' . $file . '.php';
        $path = explode('.', $key); //if needed
        $temp = &$array;
        foreach ($path as $keyx) {
            $temp =& $temp[$keyx];
        }
        return (($temp) === NULL || is_array($temp)) ? $file . '.error.' . $key : $temp;
    }
}