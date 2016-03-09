<!-- src/Template/Buses/index.ctp -->
<?php
$this->extend('/Common/vista');
$this->assign("module-name", "Mantenedores");
$this->assign("title", "Lista de Buses");
?>
<div id="marco_include">
    <div style="height:200px; overflow:auto" class="justificado_not" id="busqueda">
        <div id="busqueda">
            <table class="table" border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                <thead>
                    <tr class="e34X" id="panel_status">
                        <th colspan="2" width="1%" align="center"><?= $this->Paginator->sort("id", "Código") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("placa") ?></th>
                        <th width="10%" align="center"><?= $this->Paginator->sort("chasis") ?></th>
                        <th width="6%" align="center"><?= $this->Paginator->sort("asientos") ?></th>
                        <th width="22%" align="center"><?= $this->Paginator->sort("anio", "Año") ?></th>
                        <th width="4%" align="center"><?= __("Acciones") ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($buses as $bus) {
                        echo $this->Html->tableCells(
                            [
                                $this->Number->format($bus->id),
                                h($bus->placa),
                                h($bus->chasis),
                                h($bus->asientos),
                                h($bus->anio),
                                $this->Html->link(__('Ver'), ['action' => 'view', $bus->id]) . " | " .
                                $this->Html->link(__('Editar'), ['action' => 'edit', $bus->id]) . " | " .
                                $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $bus->id], ['confirm' => __("¿Estás seguro de deshabilitar el Bus de código {0}?", $bus->id)])
                            ], [
                                "class" => "info"
                            ], [
                                "class" => "warning"
                            ]
                        );
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->Html->link("Nuevo Bus", ["controller" => "buses", "action" => "add"], ["class" => "btn btn-primary"]) ?>
<div id="marco_include">
    <div style="height:200px; overflow:auto" class="justificado_not" id="busqueda">
        <div id="busqueda">
            <table border="0" cellpadding="1" cellspacing="1" id="marco_panel">
                <thead>
                    <tr class="e34X" id="panel_status">
                        <th colspan="2" width="1%" align="center"><?= $this->Paginator->sort("id", "Código") ?></th>
                        <th width="5%" align="center"><?= $this->Paginator->sort("placa") ?></th>
                        <th width="10%" align="center"><?= $this->Paginator->sort("chasis") ?></th>
                        <th width="6%" align="center"><?= $this->Paginator->sort("asientos") ?></th>
                        <th width="22%" align="center"><?= $this->Paginator->sort("anio", "Año") ?></th>
                        <th width="4%" align="center"><?= __("Acciones") ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="textnot2" bgcolor="#EEC22C" onclick="HighLightTR(this,'#EEC22C','cc3333');" style="cursor: pointer;" onmouseover="style.backgroundColor='#cccccc';" onmouseout="style.backgroundColor=''">
                        <td width="1%" bgcolor="#D6E4F2">1</td>
                        <td width="1%">
                            <input type="radio" name="radio" id="radio" value="radio" onclick="javascript:llama_ACTIVA_BOTONES('3683','1');transp('modulo_tramiteI/list_DESTINOS.php?id_DOC=3683&amp;pat=modulo_tramiteI&amp;codMen=24'); madacod('modulo_tramiteI/list_referencias.php?id_DOC=3683&amp;pat=modulo_tramiteI&amp;codMen=24');">
                        </td>
                        <td width="2%" class="e16 id">0436-2016</td>
                        <td class="nro_doc">
                            <a class="linktitinterno" style="cursor:pointer; cursor:hand;" onclick="transp('modulo_tramiteI/list_DESTINOS.php?id_DOC=3683&amp;pat=modulo_tramiteI&amp;codMen=24'); madacod('modulo_tramiteI/list_referencias.php?id_DOC=3683&amp;pat=modulo_tramiteI&amp;codMen=24');">
                                <div>0072-2016-TMT/GG</div>
                            </a>
                        </td>
                        <td class="justificado_not tipodoc">OFICIO</td>
                        <td class="e6 asunto">SOLICITA CAPACITACIÓN PARA EL PERSONAL DE CCT</td>
                        <td class="anio">2016-03-01</td>
                        <td>6:07:08 pm</td>
                        <td>   CMCG/CMCG</td>
                        <td></td>
                        <td align="center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ buses | json }}