
<div class="row">
    <div class="col-lg-12">
        <label><h4>Daños de la Carroceria<input type="checkbox" name="carroceria-cami" class="checkbox-inline" value="carroceria"></h4></label>
    </div>
</div>
<div id="carroceria">
    <div class='row'>
        <!-- parte delantera -->
        <div class="col-md-6">
            <h4>Parte Delantera</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-block">Capo</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moParDelCapo-ca">Capo</a></td>
                        <div id="moParDelCapo-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Parte Delantera || Capo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PDC_checkD" name="PDC_checkD" onclick="document.getElementById('PDC_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PDC_desabolla" id="PDC_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PDC_checkP" name="PDC_checkP" onclick="document.getElementById('PDC_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PDC_pintura" id="PDC_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgPDC" class="file" name="CAimgPDC[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                    </tr>
                    <tr>
                        <td class="td-block">Mascara</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moParDeLMasc-ca">Mascara</a></td>
                        <!-- MODAL PARTE DELANTERA MASCARA -->
                        <div id="moParDeLMasc-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Parte Delantera || Mascara</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PDM_checkD" name="PDM_checkD" onclick="document.getElementById('PDM_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PDM_desabolla" id="PDM_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PDM_checkP" name="PDM_checkP" onclick="document.getElementById('PDM_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PDM_pintura" id="PDM_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgPDM" class="file" name="CAimgPDM[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL PARTE DELANTERA MASCARA -->
                    </tr>
                    <tr>
                        <td class="td-block">Parachoque</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moParDeLParaDel-ca">Paracho delantero</a></td>
                        <!-- MODAL PARTE DELANTERA PARACHOQUE DELANTERO -->
                        <div id="moParDeLParaDel-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Parte Delantera || Parachoque Delantero</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PDPD_checkD" name="PDPD_checkD" onclick="document.getElementById('PDPD_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PDPD_desabolla" id="PDPD_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PDPD_checkP" name="PDPD_checkP" onclick="document.getElementById('PDPD_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PDPD_pintura" id="PDPD_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgPDPD" class="file" name="CAimgPDPD[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL PARTE DELANTERA PARACHOQUE DELANTERO -->
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- fin parte delantera -->
        <!-- lateral derecho -->
        <div class="col-md-6">
            <h4>Parte Trasera</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-block">Parachoque</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPTPara-ca">Parachoque</a></td>
                        <!-- MODAL PARTE TRASERA PARACHOQUE -->
                        <div id="moPTPara-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Parte Trasera ||  Parachoque</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PTP_checkD" name="PTP_checkD" onclick="document.getElementById('PTP_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PTP_desabolla" id="PTP_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PTP_checkP" name="PTP_checkP" onclick="document.getElementById('PTP_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PTP_pintura" id="PTP_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgPTP" class="file" name="CAimgPTP[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL PARTE TRASERA PARACHOQUE -->
                    </tr>
                    <tr>
                        <td class="td-block">Maletero</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPTMaleta-ca">Maletero</a></td>
                        <!-- MODAL PARTE TRASERA MALETERO -->
                        <div id="moPTMaleta-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Parte Trasera || Maletero</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PTM_checkD" name="PTM_checkD" onclick="document.getElementById('PTM_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PTM_desabolla" id="PTM_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="PTM_checkP" name="PTM_checkP" onclick="document.getElementById('PTM_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="PTM_pintura" id="PTM_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgPTM" class="file" name="CAimgPTM[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL PARTE TRASERA MALETERO -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class='row'>
        <div class="col-md-6">
            <h4>Lateral Derecho</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-block">Costado Trasero</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPLDcostadoT-ca">Costado Trasero</a></td>
                        <!-- MODAL LATERAL DERECHO COSTADO TRASERO -->
                        <div id="moPLDcostadoT-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Lateral Derecho || Costado Traseroo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LDCT_checkD" name="LDCT_checkD" onclick="document.getElementById('LDCT_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LDCT_desabolla" id="LDCT_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LDCT_checkP" name="LDCT_checkP" onclick="document.getElementById('LDCT_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LDCT_pintura" id="LDCT_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgLDCT" class="file" name="CAimgLDCT[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL LATERAL DERECHO COSTADO TRASERO -->
                    </tr>
                    <tr>
                        <td class="td-block">Puerta 1</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPLDpuerta1-ca">Puerta 1</a></td>
                        <!-- MODAL LATERAL DERECHO PUERTA 1 -->
                        <div id="moPLDpuerta1-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Lateral Derecho || Puerta 1</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LDP1_checkD" name="LDP1_checkD" onclick="document.getElementById('LDP1_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LDP1_desabolla" id="LDP1_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LDP1_checkP" name="LDP1_checkP" onclick="document.getElementById('LDP1_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LDP1_pintura" id="LDP1_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgLDP1" class="file" name="CAimgLDP1[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL LATERAL DERECHO PUERTA 1 -->
                    </tr>
                    <tr>
                        <td class="td-block">Puerta 2</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPLDpuerta2-ca">Puerta 2</a></td>
                        <!-- MODAL LATERAL DERECHO PUERTA 2 -->
                        <div id="moPLDpuerta2-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Lateral Derecho || Puerta 2</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LDP2_checkD" name="LDP2_checkD" onclick="document.getElementById('LDP2_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LDP2_desabolla" id="LDP2_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LDP2_checkP" name="LDP2_checkP" onclick="document.getElementById('LDP2_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LDP2_pintura" id="LDP2_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgLDP2" class="file" name="CAimgLDP2[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL LATERAL DERECHO PUERTA 2 -->
                    </tr>
                    <tr>
                        <td class="td-block">Costado Delantero</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPLDlateralD-ca">Costado Delantero</a></td>
                        <!-- MODAL LATERAL DERECHO COSTADO DELANTERO -->
                        <div id="moPLDlateralD-ca" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Lateral Derecho || Costado Delantero</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LDCD_checkD" name="LDCD_checkD" onclick="document.getElementById('LDCD_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LDCD_desabolla" id="LDCD_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LDCD_checkP" name="LDCD_checkP" onclick="document.getElementById('LDCD_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LDCD_pintura" id="LDCD_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgLDCD" class="file" name="CAimgLDCD[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL LATERAL DERECHO Costado Delantero -->
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h4>Lateral Izquierdo</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-block">Costado Delantero</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPLIcostadoD-ca">Costado Delantero</a></td>
                        <!-- MODAL LATERAL IZQUIERDO Costado Delantero -->
                        <div id="moPLIcostadoD" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Lateral Izquierdo || Costado Delantero</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LICD_checkD" name="LICD_checkD" onclick="document.getElementById('LICD_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LICD_desabolla" id="LICD_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LICD_checkP" name="LICD_checkP" onclick="document.getElementById('LICD_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LICD_pintura" id="LICD_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgLICD" class="file" name="CAimgLICD[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL LATERAL IZQUIERDO Costado Delantero -->
                    </tr>
                    <tr>
                        <td class="td-block">Puerta 1</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPLIpuerta1">Puerta 1</a></td>
                        <!-- MODAL LATERAL IZQUIERDO PUERTA 1 -->
                        <div id="moPLIpuerta1" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Lateral Izquierdo || Puerta 1</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LIP1_checkD" name="LIP1_checkD" onclick="document.getElementById('LIP1_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LIP1_desabolla" id="LIP1_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LIP1_checkP" name="LIP1_checkP" onclick="document.getElementById('LIP1_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LIP1_pintura" id="LIP1_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgLIP1" class="file" name="CAimgLIP1[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL LATERAL IZQUIERDO PUERTA 1 -->
                    </tr>
                    <tr>
                        <td class="td-block">Puerta 2</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPLIpuerta2">Puerta 2</a></td>
                        <!-- MODAL LATERAL IZQUIERDO PUERTA 2 -->
                        <div id="moPLIpuerta2" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Lateral Izquierdo || Puerta 2</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LIP2_checkD" name="LIP2_checkD" onclick="document.getElementById('LIP2_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LIP2_desabolla" id="LIP2_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LIP2_checkP" name="LIP2_checkP" onclick="document.getElementById('LIP2_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LIP2_pintura" id="LIP2_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgLIP2" class="file" name="CAimgLIP2[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL LATERAL IZQUIERDO PUERTA 2 -->
                    </tr>
                    <tr>
                        <td class="td-block">Costado Trasero</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPLIcostadoT">Costado Trasero</a></td>
                        <!-- MODAL LATERAL IZQUIERDO COSTADO TRASERO -->
                        <div id="moPLIcostadoT" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Lateral Izquierdo || Costado Traseroo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LICT_checkD" name="LICT_checkD" onclick="document.getElementById('LICT_desabolla').disabled = !this.checked;"/>
                                                                Desabolladura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LICT_desabolla" id="LICT_desabolla" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="panel">
                                                        <div class="panel-heading">
                                                            <div class="input-group">
                                                                <label><input type="checkbox" id="LICT_checkP" name="LICT_checkP" onclick="document.getElementById('LICT_pintura').disabled = !this.checked;"/>
                                                                Pintura</label>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <label>Precio</label>
                                                            <input type="number" name="LICT_pintura" id="LICT_pintura" min="0" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgLICT" class="file" name="CAimgLICT[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL LATERAL DERECHO COSTADO TRASERO -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class='row'>
        <!--Parte Superior -->
        <div class="col-md-6">
            <h4>Parte Superior</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-block">Techo</td>
                        <td class="td-block"><a class="btn btn-grey" data-toggle="modal" data-target="#moPATecho">Techo</a></td>
                        <!-- MODAL PARTE TRASERA FOCO DERECHO -->
                        <div id="moPATecho" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Parte Superior || Techo</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="panel">
                                                            <div class="panel-heading">
                                                                <div class="input-group">
                                                                    <label><input type="checkbox" id="PST_checkD" name="PST_checkD" onclick="document.getElementById('PST_desabolla').disabled = !this.checked;"/>
                                                                    Desabolladura</label>
                                                                </div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <label>Precio</label>
                                                                <input type="number" name="PST_desabolla" id="PST_desabolla" min="0" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="panel">
                                                            <div class="panel-heading">
                                                                <div class="input-group">
                                                                    <label><input type="checkbox" id="PST_checkP" name="PST_checkP" onclick="document.getElementById('PST_pintura').disabled = !this.checked;"/>
                                                                    Pintura</label>
                                                                </div>
                                                            </div>
                                                            <div class="panel-body">
                                                                <label>Precio</label>
                                                                <input type="number" name="PST_pintura" id="PST_pintura" min="0" disabled="disabled">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="panel col-lg-12">
                                                <div class="form-group">
                                                    <label>Imagenes</label>
                                                    <label for="file">Test invalid input type</label>
                                                    <input id="CAimgPAT" class="file" name="CAimgPAT[]" type="file" multiple >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            <!-- Modal content-->
                            </div>
                        </div>
                        <!-- END MODAL PARTE TRASERA FOCO DERECHO -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <label>Daños Mecanicos<input type="checkbox" class="checkbox-inline" name="mecanica" value="mecanica" onclick="habilitarCheck();"></label>
    </div>
</div>
<div id="mecanica">
    <div class="row">
        <div class="col-lg-6">
            <h4>Sistema de Frenos</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SF_checkDF" name="SF_checkDF" onchange="document.getElementById('SF_discoFr').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Discos frenos</td>
                        <td class="td-block"><input type="number" name="SF_discoFr" id="SF_discoFr" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SF_checkPF" name="SF_checkPF" onchange="document.getElementById('SF_pastillaFr').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Pastillas de freno</td>
                        <td class="td-block"><input type="number" name="SF_pastillaFr" id="SF_pastillaFr" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SF_checkCF" name="SF_checkCF" onchange="document.getElementById('SF_caliperFR').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Calipers de freno</td>
                        <td class="td-block"><input type="number" name="SF_caliperFR" id="SF_caliperFR" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SF_checkBF" name="SF_checkBF" onchange="document.getElementById('SF_bombaFR').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Bomba freno</td>
                        <td class="td-block"><input type="number" name="SF_bombaFR" id="SF_bombaFR" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
        <h4>Combustión y escape</h4>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-block"><input type="checkbox" id="CE_checkBB" name="CE_checkBB" onchange="document.getElementById('CE_bombaBe').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Bomba de bencina</td>
                    <td class="td-block"><input type="number" name="CE_bombaBe" id="CE_bombaBe" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="CE_checkBI" name="CE_checkBI" onchange="document.getElementById('CE_bombaIny').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Bomba inyectora</td>
                    <td class="td-block"><input type="number" name="CE_bombaIny" id="CE_bombaIny" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="CE_checkC" name="CE_checkC" onchange="document.getElementById('CE_carburador').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Carburador</td>
                    <td class="td-block"><input type="number" name="CE_carburador" id="CE_carburador" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="CE_checkY" name="CE_checkY" onchange="document.getElementById('CE_inyector').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Inyectores</td>
                    <td class="td-block"><input type="number" name="CE_inyector" id="CE_inyector" min="0" disabled="disabled" class="form-control"></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4>Suspensión y dirección</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SD_checkA" name="SD_checkA" onchange="document.getElementById('SD_amorti').disabled = !this.checked;" disabled="disabled" /></td>
                        <td class="td-block"> Amortiguadores</td>
                        <td class="td-block"><input type="number" name="SD_amorti" id="SD_amorti" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SD_checkB" name="SD_checkB" onchange="document.getElementById('SD_bandeja').disabled = !this.checked;" disabled="disabled" /></td>
                        <td class="td-block"> Bandejas</td>
                        <td class="td-block"><input type="number" name="SD_bandeja" id="SD_bandeja" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SD_checkBDH" name="SD_checkBDH" onchange="document.getElementById('SD_bombaDH').disabled = !this.checked;" disabled="disabled" /></td>
                        <td class="td-block"> Bomba dirección hidráulica</td>
                        <td class="td-block"><input type="number" name="SD_bombaDH" id="SD_bombaDH" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SD_checkCD" name="SD_checkCD" onchange="document.getElementById('SD_cremalleraD').disabled = !this.checked;" disabled="disabled" /></td>
                        <td class="td-block"><label>Cremalleras de dirección</label></td>
                        <td class="td-block"><input type="number" name="SD_cremalleraD" id="SD_cremalleraD" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SD_checkFCD" name="SD_checkFCD" onchange="document.getElementById('SD_fuelleCD').disabled = !this.checked;" disabled="disabled" /></td>
                        <td class="td-block"> Fuelles cremalleras de dirección</td>
                        <td class="td-block"><input type="number" name="SD_fuelleCD" id="SD_fuelleCD" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SD_checkM" name="SD_checkM" onchange="document.getElementById('SD_munones').disabled = !this.checked;" disabled="disabled" /></td>
                        <td class="td-block"> Muñones</td>
                        <td class="td-block"><input type="number" name="SD_munones" id="SD_munones" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="SD_checkTD" name="SD_checkTD" onchange="document.getElementById('SD_terminalD').disabled = !this.checked;" disabled="disabled" /></td>
                        <td class="td-block"> Terminales de dirección</td>
                        <td class="td-block"><input type="number" name="SD_terminalD" id="SD_terminalD" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
        </div>	
        <div class="col-lg-6">
        <h4>Rodamientos y retenes</h4>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-block"><input type="checkbox" id="RR_checkKR" name="RR_checkKR" onchange="document.getElementById('RR_kitRoda').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Kit de rodamiento de rueda</td>
                    <td class="td-block"><input type="number" name="RR_kitRoda" id="RR_kitRoda" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="RR_checkReCC" name="RR_checkReCC" onchange="document.getElementById('RR_retenCajaC').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Retén caja cambios</td>
                    <td class="td-block"><input type="number" name="RR_retenCajaC" id="RR_retenCajaC" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="RR_checkReC" name="RR_checkReC" onchange="document.getElementById('RR_retenCig').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Retén de cigüeñal</td>
                    <td class="td-block"><input type="number" name="RR_retenCig" id="RR_retenCig" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="RR_checkReR" name="RR_checkReR" onchange="document.getElementById('RR_retenR').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Retén de rueda</td>
                    <td class="td-block"><input type="number" name="RR_retenR" id="RR_retenR" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="RR_checkRoCC" name="RR_checkRoCC" onchange="document.getElementById('RR_rodaCC').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Rodamiento caja de cambio</td>
                    <td class="td-block"><input type="number" name="RR_rodaCC" id="RR_rodaCC" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="RR_checkRoD" name="RR_checkRoD" onchange="document.getElementById('RR_rodaD').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Rodamiento de dirección</td>
                    <td class="td-block"><input type="number" name="RR_rodaD" id="RR_rodaD" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="RR_checkRoE" name="RR_checkRoE" onchange="document.getElementById('RR_rodaE').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Rodamiento de embrague</td>
                    <td class="td-block"><input type="number" name="RR_rodaE" id="RR_rodaE" min="0" disabled="disabled" class="form-control"></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4>Calefacción y ventilación</h4>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="CV_checkBA" name="CV_checkBA" onchange="document.getElementById('CV_bombaA').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Bomba de agua</td>
                        <td class="td-block"><input type="number" name="CV_bombaA" id="CV_bombaA" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="CV_checkCAA" name="CV_checkCAA" onchange="document.getElementById('CV_condensaAA').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Condensador de aire acondicionado</td>
                        <td class="td-block"><input type="number" name="CV_condensaAA" id="CV_condensaAA" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="CV_checkM" name="CV_checkM" onchange="document.getElementById('CV_manguera').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Mangueras</td>
                        <td class="td-block"><input type="number" name="CV_manguera" id="CV_manguera" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="CV_checkRC" name="CV_checkRC" onchange="document.getElementById('CV_radiadorC').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Radiador calefacción</td>
                        <td class="td-block"><input type="number" name="CV_radiadorC" id="CV_radiadorC" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="CV_checkRM" name="CV_checkRM" onchange="document.getElementById('CV_radiadorM').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Radiador motor</td>
                        <td class="td-block"><input type="number" name="CV_radiadorM" id="CV_radiadorM" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                    <tr>
                        <td class="td-block"><input type="checkbox" id="CV_checkTP" name="CV_checkTP" onchange="document.getElementById('CV_tapaR').disabled = !this.checked;" disabled="disabled"/></td>
                        <td class="td-block"> Tapa Radiador</td>
                        <td class="td-block"><input type="number" name="CV_tapaR" id="CV_tapaR" min="0" disabled="disabled" class="form-control"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
        <h4>Espejos y cristales</h4>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-block"><input type="checkbox" id="EC_checkERE" name="EC_checkERE" onchange="document.getElementById('EC_espejoREx').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Espejo retrovisor exterior</td>
                    <td class="td-block"><input type="number" name="EC_espejoREx" id="EC_espejoREx" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="EC_checkERI" name="EC_checkERI" onchange="document.getElementById('EC_espejoRIn').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Espejo retrovisor interior</td>
                    <td class="td-block"><input type="number" name="EC_espejoRIn" id="EC_espejoRIn" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="EC_checkP" name="EC_checkP" onchange="document.getElementById('EC_Parabri').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Parabrisas</td>
                    <td class="td-block"><input type="number" name="EC_Parabri" id="EC_Parabri" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="EC_checkV" name="EC_checkV" onchange="document.getElementById('EC_ventana').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Ventanas</td>
                    <td class="td-block"><input type="number" name="EC_ventana" id="EC_ventana" min="0" disabled="disabled" class="form-control"></td>
                </tr>
                <tr>
                    <td class="td-block"><input type="checkbox" id="EC_checkFD" name="EC_checkFD" onchange="document.getElementById('EC_focoD').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Foco Delantero</td>
                    <td class="td-block"><input type="number" name="EC_focoD" id="EC_focoD" min="0" disabled="disabled" class="form-control"></td>
                </tr
                <tr>
                    <td class="td-block"><input type="checkbox" id="EC_checkFT" name="EC_checkFT" onchange="document.getElementById('EC_focoT').disabled = !this.checked;" disabled="disabled"/></td>
                    <td class="td-block"> Foco Trasero</td>
                    <td class="td-block"><input type="number" name="EC_focoT" id="EC_focoT" min="0" disabled="disabled" class="form-control"></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
    <script src="JS/inputFileJS.js"></script>