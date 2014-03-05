<html>
<head>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" />
</head>

<body>
     <div id="container">  
        <div id="header">
            <a href=" <?php echo base_url() ?>">Mista Headzo</a>
            <?php print_r($image_url) ?>

        </div>
        <div id="gallery">
        <?php foreach ($image_url as $image): ?>
                    <img src="<?php echo $image; ?>" />
                </a>
            </div>
            
            <?php endforeach; ?>
        </div>
        
        <div id="form">
        <?php
        echo form_open('site');
        $data = array(
                  'name'        => 'url',
                  'placeholder'          => 'URL');
        echo form_input($data);
        echo form_submit('submit', 'Submit');
        ?>
        </div>
        
    </div>
</body>

</html>