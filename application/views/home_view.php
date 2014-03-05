<html>
<head>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/default.css'; ?>" />
</head>

<body>
     <div id="container">  
        <div id="header">
            Mista Headzo
            <?php print_r($pictures) ?>



        </div>
        <div id="gallery">
        <?php if(isset($pictures) && count($pictures)):
            foreach ($pictures as $picture): ?>
            <div class="thumb">
                <a href="site/thumb/?image=<?php echo $picture['id']; ?>">
                    <img src="<?php echo $picture['thumb_url']; ?>" />
                </a>
            </div>
            
            <?php endforeach; ?>
        <?php endif; ?>
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