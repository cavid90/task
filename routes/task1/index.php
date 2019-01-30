<div class="container">
    <div class="starter-template">
        <h1>Task1 - Name</h1>
    </div>
    <?php
    $bin = '01110000 01110010 01101001 01101110 01110100 00100000 01101111 01110101 01110100 00100000 01111001 01101111 01110101 01110010 00100000 01101110 01100001 01101101 01100101 00100000 01110111 01101001 01110100 01101000 00100000 01101111 01101110 01100101 00100000 01101111 01100110 00100000 01110000 01101000 01110000 00100000 01101100 01101111 01101111 01110000 01110011';
    $bin2text = bin2text($bin);
    echo '<br>';
    $letters = ['J','A','V','I','D'];
    $name = '';
    for($i=0;$i<count($letters);$i++) {
        $name .= $letters[$i];
    }

    ?>
    <strong>Binary: </strong><?=$bin?>
    <br>
    <strong>Binary to text: </strong><?=$bin2text?>
    <br>
    <strong>Code:</strong>
    <pre>
        <code>
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

        $bin = '01110000 01110010 01101001 01101110 01110100 00100000 01101111 01110101 01110100 00100000 01111001 01101111 01110101 01110010 00100000 01101110 01100001 01101101 01100101 00100000 01110111 01101001 01110100 01101000 00100000 01101111 01101110 01100101 00100000 01101111 01100110 00100000 01110000 01101000 01110000 00100000 01101100 01101111 01101111 01110000 01110011';
        $bin2text = bin2text($bin);
        $letters = ['J','A','V','I','D'];
        $name = '';
        for($i=0;$i < count($letters);$i++) {
            $name .= $letters[$i];
        }

        echo $name;
    </code>
    </pre>



</div><!-- /.container -->