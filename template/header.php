<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
		<head>
            <title><?=$this->title;?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="keywords" 
				  charset="UTF-8"
				  content="<?=$this->meta_keywords;?>"/>
			<?php foreach($this->styles as $style) : ?>
				<link rel="stylesheet" type="text/css" href="<?=$this->environment->getHost() . $this->environment->getServiceName() . 'template/css/'. $style?>"/>
            <?php endforeach; ?>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		</head>
		<body>