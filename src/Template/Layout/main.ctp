<html>
<head>
    <title><?= $this->fetch("title"); ?></title>
    <meta charset="UTF-8">
    <?= $this->Html->css(["ribbon.css", "bootstrap.min.css", "style.css", 
        "fonts25.css", "panels.css", "angular-animations.css"]) ?>
    <?= $this->Html->css(["jquery-ui.min.css", "jquery-ui.structure.css", "jquery-ui.theme.min.css"]) ?>
    <?= $this->Html->script(["angular.min.js", "angular-route.min.js", 
        "angular-resource.min.js", "angular-animate.min.js", "ng-file-upload.min.js",
        "angular-input-date", "VentaPasajesApp/app.js"])
    ?> 
    <?= $this->Html->script(["VentaPasajesApp/buses/BusesService.js",
        "VentaPasajesApp/estados/EstadosService.js",
        "VentaPasajesApp/rutas/RutasService.js",
        "VentaPasajesApp/agencias/AgenciasService.js",
        "VentaPasajesApp/ubigeos/UbigeosService.js",
        "VentaPasajesApp/restricciones/RestriccionesService.js",
        "VentaPasajesApp/tarifas/TarifasService.js",
        "VentaPasajesApp/detalleDesplazamientos/DetalleDesplazamientosService.js",
        "VentaPasajesApp/personas/PersonasService.js",
        "VentaPasajesApp/conductores/ConductoresService.js",
        "VentaPasajesApp/servicios/ServiciosService.js",
        "VentaPasajesApp/desplazamientos/DesplazamientosService.js",
        "VentaPasajesApp/busPisos/BusPisosService.js",
        "VentaPasajesApp/busAsientos/BusAsientosService.js",
        "VentaPasajesApp/programaciones/ProgramacionesService.js",
        "VentaPasajesApp/pasajes/PasajesService.js",
        "VentaPasajesApp/encomiendas/EncomiendasService.js",
        "VentaPasajesApp/tipoProductos/TipoProductosService.js",
        "VentaPasajesApp/clientes/ClientesService.js"
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
        "VentaPasajesApp/conductores/ViewConductoresController.js",
        
        "VentaPasajesApp/tipoProductos/ListTipoProductosController.js",
        "VentaPasajesApp/tipoProductos/AddTipoProductosController.js",
        "VentaPasajesApp/tipoProductos/EditTipoProductosController.js",
        "VentaPasajesApp/tipoProductos/ViewTipoProductosController.js",
        
        "VentaPasajesApp/encomiendas/EncomiendasController.js",
        "VentaPasajesApp/encomiendas/EncomiendasViewController.js",
        
        "VentaPasajesApp/clientes/ListClientesController.js",
        "VentaPasajesApp/clientes/AddClientesController.js",
        "VentaPasajesApp/clientes/EditClientesController.js",
        "VentaPasajesApp/clientes/ViewClientesController.js"        
    ]) ?>
    <?= $this->Html->script([
        "jquery-1.12.1.min",
        "bootstrap.min",
        "jquery-ui.min",
        "datepicker-es",
        "checklist-model"
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
    <img src="img/loading.gif" ng-show='layout.loading' class="animated ss-loading"/>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?= $this->Flash->render() ?>
                <div ng-view ng-hide='layout.loading' class="animated"></div>
            </div>
        </div>
    </div>
</body>
</html>