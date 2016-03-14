<html>
<head>
    <title><?= $this->fetch("title"); ?></title>
    <meta charset="UTF-8">
    <?= $this->Html->css(["ribbon.css", "bootstrap.min.css", "style.css", 
        "fonts25.css", "panels.css", "angular-animations.css"]) ?>
    <?= $this->Html->script(["angular.min.js", "angular-route.min.js", 
        "angular-resource.min.js", "angular-animate.min.js",
        "VentaPasajesApp/app.js"]) 
    ?> 
    <?= $this->Html->script(["VentaPasajesApp/buses/BusesService.js",
        "VentaPasajesApp/estados/EstadosService.js",
        "VentaPasajesApp/rutas/RutasService.js",
         "VentaPasajesApp/agencias/AgenciasService.js",
         "VentaPasajesApp/ubigeos/UbigeosService.js",
         "VentaPasajesApp/tarifas/TarifasService.js"])
    ?>
    <?= $this->Html->script(["VentaPasajesApp/buses/ListBusesController.js", 
        "VentaPasajesApp/buses/AddBusesController.js",
        "VentaPasajesApp/buses/EditBusesController.js",
        "VentaPasajesApp/buses/ViewBusesController.js",
        
        "VentaPasajesApp/rutas/ListRutasController.js",
        
        "VentaPasajesApp/agencias/ListAgenciasController.js",
        "VentaPasajesApp/agencias/AddAgenciasController.js",
        "VentaPasajesApp/agencias/EditAgenciasController.js",
        "VentaPasajesApp/agencias/ViewAgenciasController.js",
        
        "VentaPasajesApp/tarifas/ListTarifasController.js"
    ]) ?>
</head>
<body ng-app="VentaPasajesApp">
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
                <div ng-view></div>
            </div>
        </div>
    </div>
        
    <?= $this->Html->script([
        "jquery-1.12.1.min.js",
        "bootstrap.min.js"
    ]) ?>
</body>
</html>