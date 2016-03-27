<html>
<head>
    <title><?= $this->fetch("title"); ?></title>
    <meta charset="UTF-8">
    <?= $this->Html->css(["ribbon.css", "bootstrap.min.css", "style.css", 
        "fonts25.css", "panels.css", "angular-animations.css"]) ?>
    <?= $this->Html->script(["angular.min.js", "angular-route.min.js", 
        "angular-resource.min.js", "angular-animate.min.js", "ng-file-upload.min.js",
        "VentaPasajesApp/app.js"]) 
    ?> 
    <?= $this->Html->script(["VentaPasajesApp/buses/BusesService.js",
        "VentaPasajesApp/estados/EstadosService.js",
        "VentaPasajesApp/rutas/RutasService.js",
        "VentaPasajesApp/agencias/AgenciasService.js",
        "VentaPasajesApp/ubigeos/UbigeosService.js",
        "VentaPasajesApp/tarifas/TarifasService.js",
        "VentaPasajesApp/detalleDesplazamientos/DetalleDesplazamientosService.js",
        "VentaPasajesApp/personas/PersonasService.js",
        "VentaPasajesApp/conductores/ConductoresService.js",
        "VentaPasajesApp/servicios/ServiciosService.js",
        "VentaPasajesApp/desplazamientos/DesplazamientosService.js",
        "VentaPasajesApp/programaciones/ProgramacionesService.js"
    ])
    ?>
    <?= $this->Html->script(["VentaPasajesApp/buses/ListBusesController.js", 
        "VentaPasajesApp/buses/AddBusesController.js",
        "VentaPasajesApp/buses/EditBusesController.js",
        "VentaPasajesApp/buses/ViewBusesController.js",
        "VentaPasajesApp/buses/AdministrarBusesController.js",
        
        "VentaPasajesApp/rutas/ListRutasController.js",
        "VentaPasajesApp/rutas/AddRutasController.js",
        
        "VentaPasajesApp/agencias/ListAgenciasController.js",
        "VentaPasajesApp/agencias/AddAgenciasController.js",
        "VentaPasajesApp/agencias/EditAgenciasController.js",
        "VentaPasajesApp/agencias/ViewAgenciasController.js",
        
        "VentaPasajesApp/detalleDesplazamientos/AddDetalleDesplazamientosController.js",
        "VentaPasajesApp/detalleDesplazamientos/SetRestriccionesController.js",
        
        "VentaPasajesApp/tarifas/ListTarifasController.js",
        
        "VentaPasajesApp/programaciones/ListProgramacionesController.js",
        "VentaPasajesApp/programaciones/AddProgramacionesController.js",
      
        "VentaPasajesApp/personas/ListPersonasController.js",
        "VentaPasajesApp/personas/AddPersonasController.js",
        "VentaPasajesApp/personas/EditPersonasController.js",
        "VentaPasajesApp/personas/ViewPersonasController.js",
        
        "VentaPasajesApp/servicios/ListServiciosController.js",
        "VentaPasajesApp/servicios/AddServiciosController.js",
        "VentaPasajesApp/servicios/EditServiciosController.js",
        "VentaPasajesApp/servicios/ViewServiciosController.js",
        
        "VentaPasajesApp/pasajes/PasajesController.js",
        
        "VentaPasajesApp/conductores/ListConductoresController.js",
        "VentaPasajesApp/conductores/AddConductoresController.js",
        "VentaPasajesApp/conductores/EditConductoresController.js",
        "VentaPasajesApp/conductores/ViewConductoresController.js"
    ]) ?>
    <?= $this->Html->script([
        "jquery-1.12.1.min",
        "bootstrap.min",
        "jquery-ui.min"
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
</body>
</html>