<html>
<head>
    <title><?= $this->fetch("title"); ?></title>
    <meta charset="UTF-8">
    <?= $this->Html->css(["ribbon.css", "bootstrap.min.css", "style.css", "fonts25.css", "panels.css"]) ?>
</head>
<body>
    <div class="row">
        <div id="ribbon" class="col-sm-12 navbar-fixed-top">
            <p>    
                <marquee>.:: Sistema de Tramite Documentario ::. Transportes Metropolitanos de Trujillo - TMT</marquee>
            </p>
            <?= $this->element("ribbon-menu") ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?= $this->Flash->render() ?>
                <?= $this->fetch("content") ?>
            </div>
        </div>
    </div>
        
    <?= $this->Html->script([
        "jquery-1.12.1.min.js",
        "bootstrap.min.js"
    ]) ?>
</body>
</html>