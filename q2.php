<?php
    
    function esconde_senha($texto){
        return preg_replace(
			'\senha:/[0-9]\.',
			'*',
			$texto
		);
	}

    echo esconde_senha('Esta conta tem senha:  123456.');

?>