<html>
<head>
    <title><?= $this->fetch("title"); ?></title>
    <meta charset="UTF-8">
    <?= $this->Html->css(["ribbon.css", "bootstrap.min.css", "style.css"]) ?>
</head>
<body>
    <div id="ribbon" unselectable="on">
        <span class="ribbon-window-title" style="background:url(img/PLANTILLASIS_r1_c1.png) repeat-x;height:27px" unselectable="on">
            <div style="float:left" unselectable="on">
                <marquee>.:: Sistema de Tramite Documentario ::. Transportes Metropolitanos de Trujillo - TMT</marquee>
            </div>
            <div style=" color:#0F0; position:fixed;right:0px;top:0px; z-index:1001; padding:2px; " unselectable="on">
                <div style="float:right; margin:2px" unselectable="on">
                    <span style="cursor:pointer; " onclick="window.top.min(2)" title="Minimizar" unselectable="on">
                        <img src="icos/mini.png" width="12" height="13">
                    </span>
                    <span style="cursor:pointer" onclick="window.top.res()" title="Maximizar" unselectable="on">
                        <img src="icos/max.png" width="12" height="12">
                    </span>
                </div>
                <div id="hora" style="float:right; top:0px; background:#000;" unselectable="on">10:30:59</div>
                <div id="ff" style="float:right; top:0px; background:#000;" unselectable="on">
                Miércoles 02 de Marzo del 2016 - 
                </div> 
            </div>
        </span>
        <?= $this->element("ribbon-menu") ?>
    </div>
    <div class="container">
        <?= $this->fetch("content") ?>
    </div>
        
    <?= $this->Html->script([
        "jquery-1.12.1.min.js",
        "bootstrap.min.js"
    ]) ?>
</body>
</html>