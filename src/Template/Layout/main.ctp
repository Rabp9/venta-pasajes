<html>
<head>
    <title><?= $this->fetch("title"); ?></title>
    <meta charset="UTF-8">
    <link href="ribbon/ribbon.css" rel="stylesheet" type="text/css">
    <link href="soft_button.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min_2.js"></script>
    <script type="text/javascript" src="ribbon/ribbon.js"></script>
    <script type="text/javascript" src="ribbon/jquery.tooltip.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#ribbon').ribbon();

            $('#enable-btn').click(function() {
                $('#del-table-btn').enable();
                $('#del-page-btn').enable();
                $('#save-btn').enable();
                $('#other-btn-2').enable();

                $('#enable-btn').hide();
                $('#disable-btn').show();	
            });
            $('#disable-btn').click(function() {
                $('#del-table-btn').disable();
                $('#del-page-btn').disable();
                $('#save-btn').disable();
                $('#other-btn-2').disable();

                $('#disable-btn').hide();
                $('#enable-btn').show();	
            });

            $('.ribbon-button').click(function() {
                if (this.isEnabled()) {
                        //alert($(this).attr('id') + ' clicked');
                }
            });
        });
    </script>
    <script language="javascript"> 
        window.onload = hora;
        fecha = new Date('02 Mar 2016 8:06:57');
        function hora(){
            var hora = fecha.getHours();
            var minutos = fecha.getMinutes();
            var segundos = fecha.getSeconds();
            if(hora < 10) { hora = 0 + hora; }
            if(minutos < 10){ minutos = 0 + minutos; }
            if(segundos < 10){ segundos = 0 + segundos; }
            fech = hora + ':' + minutos + ':' + segundos;
            document.getElementById('hora').innerHTML = fech;
            fecha.setSeconds(fecha.getSeconds() + 1);
            setTimeout('hora()', 1000);
        }
    </script> 
</head>
<body>
    <div id="ribbon" unselectable="on">
        <span class="ribbon-window-title" style="background:url(menusis/PLANTILLASIS_r1_c1.png) repeat-x;height:27px" unselectable="on">
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
                <div id="hora" style="float:right; top:0px; background:#000;" unselectable="on">8:17:49</div>
                <div id="ff" style="float:right; top:0px; background:#000;" unselectable="on">
                    Miércoles 02 de Marzo del 2016 - 
                </div> 
            </div>
        </span><div id="ribbon-tab-header-strip" unselectable="on"><div id="ribbon-tab-header-0" class="ribbon-tab-header sel" unselectable="on"><span class="ribbon-title" unselectable="on">PERFIL</span></div><div id="ribbon-tab-header-1" class="ribbon-tab-header" unselectable="on"><span class="ribbon-title" unselectable="on">TRAMITE INTERNO</span></div><div id="ribbon-tab-header-2" class="ribbon-tab-header" unselectable="on"><span class="ribbon-title" unselectable="on">TRAMITE EXTERNO</span></div></div>
        <div class="ribbon-tab" id="format-tab1" unselectable="on" style="display: block;">
        
        
<div class="ribbon-section" unselectable="on"> 

					<table width="262" border="0" cellspacing="0" cellpadding="0">
  <tbody><tr>
    <td width="72" align="center"><img src="menusis/user.png" width="39" height="30"></td>
    <td width="190">&nbsp;</td>
    
  </tr>
  <tr>
    <td class="e16">Bienvenido:</td>
    <td class="e51">ccipriano</td>
  </tr>
</tbody></table>

</div><div class="ribbon-section-sep" unselectable="on"></div>


<div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="/TMT/SISTRAMDOC/menu_new.php?doLogout=true&amp;cod_u=136&amp;cod_area=1" target="_top">
                    <img src="iconos_menus/salir.png" alt="Cerrar Sesión" width="30" height="28" border="0"></a>
                   
<span class="button-title" unselectable="on">Cerrar Sesión</span></div> 
</div><div class="ribbon-section-sep" unselectable="on"></div>



<div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
	<a href="pagitem.php?pags=12&amp;itm=136" target="contenedora">
                    <img src="icos/perfil.png" alt="Datos Personales" width="41" height="30" border="0"></a>
                   
<span class="button-title" unselectable="on">Perfil</span></div> 
</div><div class="ribbon-section-sep" unselectable="on"></div>

<div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					
                    <img src="iconos_menus/update.png" alt="Refrescar Pagina" width="30" height="30" border="0">
                   
<span class="button-title" unselectable="on">Actualizar</span></div> 
</div><div class="ribbon-section-sep" unselectable="on"></div>


	
    </div>  
             
    <div class="ribbon-tab" id="format-tab6" unselectable="on" style="display: none;">
        
                                          <div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="pagitem.php?pags=21&amp;itm=136&amp;cod_area=1" target="contenedora">
                    
                    <img src="iconos_menus/966136474a.png" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">  </a>                 
<span class="button-title" unselectable="on">Redactar Documento</span></div>
</div><div class="ribbon-section-sep" unselectable="on"></div>                                  <div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="pagitem.php?pags=23&amp;itm=136&amp;cod_area=1" target="contenedora">
                    
                    <img src="iconos_menus/c2a23c19be.png" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">  </a>                 
<span class="button-title" unselectable="on">RECIBIDOS</span></div>
</div><div class="ribbon-section-sep" unselectable="on"></div>                                  <div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="pagitem.php?pags=24&amp;itm=136&amp;cod_area=1" target="contenedora">
                    
                    <img src="iconos_menus/88b5cf5d73.png" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">  </a>                 
<span class="button-title" unselectable="on">EMITIDOS</span></div>
</div><div class="ribbon-section-sep" unselectable="on"></div>                                  <div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="pagitem.php?pags=26&amp;itm=136&amp;cod_area=1" target="contenedora">
                    
                    <img src="iconos_menus/7934f66174.png" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">  </a>                 
<span class="button-title" unselectable="on">BORRADOR</span></div>
</div><div class="ribbon-section-sep" unselectable="on"></div>                                  <div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="pagitem.php?pags=29&amp;itm=136&amp;cod_area=1" target="contenedora">
                    
                    <img src="iconos_menus/039d10cb56.png" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">  </a>                 
<span class="button-title" unselectable="on">ANULADOS</span></div>
</div><div class="ribbon-section-sep" unselectable="on"></div>                
                            
    </div>  
         
    <div class="ribbon-tab" id="format-tab9" unselectable="on" style="display: none;">
        
                                          <div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="pagitem.php?pags=30&amp;itm=136&amp;cod_area=1" target="contenedora">
                    
                    <img src="iconos_menus/registro.png" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">  </a>                 
<span class="button-title" unselectable="on">REGISTRO EXPEDIENTE</span></div>
</div><div class="ribbon-section-sep" unselectable="on"></div>                                  <div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="pagitem.php?pags=31&amp;itm=136&amp;cod_area=1" target="contenedora">
                    
                    <img src="iconos_menus/expedientes.png" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">  </a>                 
<span class="button-title" unselectable="on">EXPEDIENTES</span></div>
</div><div class="ribbon-section-sep" unselectable="on"></div>                                  <div class="ribbon-section" unselectable="on"> 
<div class="ribbon-button ribbon-button-large" id="add-table-btn" unselectable="on">
					<a href="pagitem.php?pags=33&amp;itm=136&amp;cod_area=1" target="contenedora">
                    
                    <img src="iconos_menus/usuarios.png" class="ribbon-icon ribbon-normal ribbon-hot ribbon-disabled ribbon-implicit-disabled" width="30" height="32">  </a>                 
<span class="button-title" unselectable="on">ADMINISTRAR USUARIOS</span></div>
</div><div class="ribbon-section-sep" unselectable="on"></div>                
                            
    </div>  
    </div>
<div id="tooltip" class="viewport-bottom" style="display: none; visibility: hidden; left: 496px; right: auto; top: 103px;"><h3 style="display: none;"></h3><div class="body" style="display: none;"></div><div class="url" style="display: none;"></div></div>
    
    

<div style="background:url(menusis/logo_tmt.png) no-repeat center; height:350px;"></div>
</body>
</html>