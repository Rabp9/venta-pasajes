<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li id="liPerfil" role="presentation" class="active"><a data-target="#perfil" aria-controls="home" role="tab" data-toggle="tab">Perfil</a></li>
        <li id="liMantenedores" role="presentation"><a data-target="#mantenedores" aria-controls="profile" role="tab" data-toggle="tab">Mantenedores</a></li>
        <li id="liProgramacion" role="presentation"><a data-target="#programacion" aria-controls="settings" role="tab" data-toggle="tab">Programación</a></li>
        <li id="liVentas" role="presentation"><a data-target="#ventas" aria-controls="messages" role="tab" data-toggle="tab">Ventas</a></li>
        <li id="liReportes" role="presentation"><a data-target="#reportes" aria-controls="settings" role="tab" data-toggle="tab">Reportes</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="perfil">
            <div class="ribbon-tab" id="format-tab6" unselectable="on" style="display: block;">
                <div class="ribbon-section" unselectable="on">
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" ng-href="#/users/manage">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                        <span class="button-title" unselectable="on">Usuario: {{ user.username }}</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                <div class="ribbon-section" unselectable="on">
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" ng-click="refresh()">
                            <span class="glyphicon glyphicon-refresh"></span>
                        </a>
                        <span class="button-title" unselectable="on">Actualizar</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" ng-click="logout()">
                            <span class="glyphicon glyphicon-log-out"></span>
                        </a>
                        <span class="button-title" unselectable="on">Cerrar Sesión</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane active" id="mantenedores">
            <div class="ribbon-tab" id="format-tab6" unselectable="on" style="display: block;">
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/agencias">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Agencias</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>         
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/buses">
                            <span class="glyphicon glyphicon-car"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Buses</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>         
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/personas">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>                  
                        <span class="button-title" unselectable="on">Personas</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div> 
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/conductores">
                            <span class="glyphicon glyphicon-user-key"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Conductores</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/servicios">
                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Servicios</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/tarifas">
                            <span class="glyphicon glyphicon-usd"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Tarifas</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/tipoProductos">
                            <span class="glyphicon glyphicon-briefcase"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Tipo de Productos</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/clientes">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Clientes</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                
            </div>
        </div>
        <div role="tabpanel" class="tab-pane active" id="programacion">
            <div class="ribbon-tab" id="format-tab6" unselectable="on" style="display: block;">
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/rutas">
                            <span class="glyphicon glyphicon-road"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Rutas</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>         
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/programaciones">
                            <span class="glyphicon glyphicon-tasks"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Programación</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>         
                
            </div>
        </div>
        
        <div role="tabpanel" class="tab-pane active" id="ventas">
            <div class="ribbon-tab" id="format-tab6" unselectable="on" style="display: block;">
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/pasajes">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Pasajes</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/giros">
                            <span class="glyphicon glyphicon-credit-card"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Giros</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>         
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/encomiendas">
                            <span class="glyphicon glyphicon-send"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Encomiendas</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a class="btn-lg" href="#/importar">
                            <span class="glyphicon glyphicon-sort"></span>
                        </a>                 
                        <span class="button-title" unselectable="on">Importar / Exportar</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
            </div>
        </div>
        
        <div role="tabpanel" class="tab-pane active" id="reportes">
            <div class="ribbon-tab" id="format-tab6" unselectable="on" style="display: block;">
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a href="pagitem.php?pags=21&amp;itm=136&amp;cod_area=1" target="contenedora">
                            <img src="" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">
                        </a>                 
                        <span class="button-title" unselectable="on">Reporte de Ventas</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a href="pagitem.php?pags=21&amp;itm=136&amp;cod_area=1" target="contenedora">
                            <img src="" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">
                        </a>                 
                        <span class="button-title" unselectable="on">Reporte 2</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>         
                
                <div class="ribbon-section" unselectable="on"> 
                    <div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
                        <a href="pagitem.php?pags=21&amp;itm=136&amp;cod_area=1" target="contenedora">
                            <img src="" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">
                        </a>                 
                        <span class="button-title" unselectable="on">Reporte 3</span>
                    </div>
                </div>
                <div class="ribbon-section-sep" unselectable="on"></div>     
            </div>
        </div>
    </div>
</div>
