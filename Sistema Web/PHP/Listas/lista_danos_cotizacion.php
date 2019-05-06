<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<div class="row">
            
            <!-- hay artos div con espacios, para llegar a los lugaes de la imagen -->
            <div class="col-lg-6">
                <div id="capa1" class="col-lg-12">
                    <img class="img-responsive" src="images/partes_vehiculo/prt_delantera.png" style="float: left;">
                </div>
                <div id="capa2" class="col-lg-offset-0">
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12"><a data-toggle="modal" data-target="#myModal">Foco D</a></div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <a data-toggle="collapse" data-target="#desabollar" class="btn btn-grey">Desabollar</a>
                                            </div>
                                            <div class="form-group">
                                                <div id="desabollar" class="collapse">
                                                    <label>Categoria de daño</label>
                                                    <select name="desabolla">
                                                      <option>Seleccione Categoria</option>
                                                      <option>1 || Precio || Tiempo</option>
                                                      <option>2 || Precio || Tiempo</option>
                                                      <option>3 || Precio || Tiempo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <a data-toggle="collapse" data-target="#pintar" class="btn btn-grey">Pintar</a>
                                            </div>
                                            <div class="form-group">
                                                <div id="pintar" class="collapse">
                                                    <label>Categoria de pintura</label>
                                                    <select name="pintar">
                                                      <option>Seleccione Categoria</option>
                                                      <option>1 || Precio || Tiempo</option>
                                                      <option>2 || Precio || Tiempo</option>
                                                      <option>3 || Precio || Tiempo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="panel col-lg-12">
                                            <div class="form-group">
                                                <label>Imagenes</label>
                                                <label for="file">Test invalid input type</label>
                                                <input id="file" class="file" type="file" multiple data-min-file-count="3">
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
                <div id="capa2" class="col-lg-offset-2">
                    <div class="col-lg-12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Capo</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">Paracho delantero</div>
                </div>
                <div id="capa2" class="col-lg-offset-6">
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">Foco I<input hidden="hidden" value="4" class="input-mini"></div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">Mascara<input hidden="hidden" value="2" class="input-mini"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="capa1" class="col-lg-12">
                    <img class="img-responsive" src="images/partes_vehiculo/prt_lateral_DRC.png" style="float: left;">
                </div>
                <div id="capa2" class="col-lg-offset-0">
                    <div class="col-lg-12">Lt Drch Costado Trasero<input hidden="hidden" value="13" class="input-mini"></div>
                </div>
                <div id="capa2" class="col-lg-offset-2">
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">Puerta 2<input hidden="hidden" value="12" class="input-mini"></div>
                </div>
                <div id="capa2" class="col-lg-offset-7">
                    <div class="col-lg-12">lt Drch Costado Delantero<input hidden="hidden" value="14" class="input-mini"></div>
                </div>
                <div id="capa2" class="col-lg-offset-6">
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">&nbsp;</div>
                    <div class="col-lg-12">Puerta 1<input hidden="hidden" value="11" class="input-mini"></div>
                    
                </div>
            </div>
        </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div id="capa1" class="col-lg-12">
                        <img class="img-responsive" src="images/partes_vehiculo/prt_lateral_IZQ.png" style="float: left;">
                    </div>
                    <div id="capa2" class="col-lg-offset-0">
                        <div class="col-lg-12">Lt Izq Costado Delantero<input hidden="hidden" value="17" class="input-mini"></div>
                    </div>
                    <div id="capa2" class="col-lg-offset-2">
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">Puerta 1<input hidden="hidden" value="15" class="input-mini"></div>
                    </div>
                    <div id="capa2" class="col-lg-offset-7">
                        <div class="col-lg-12">lt Izq Costado Trasero<input hidden="hidden" value="18" class="input-mini"></div>
                    </div>
                    <div id="capa2" class="col-lg-offset-6">
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">Puerta 2<input hidden="hidden" value="16" class="input-mini"></div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="capa1" class="col-lg-12">
                        <img class="img-responsive" src="images/partes_vehiculo/prt_trasera.png" style="float: left;">
                    </div>
                    <div id="capa2" class="col-lg-offset-0">
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">Foco I<input hidden="hidden" value="9" class="input-mini"></div>
                    </div>
                    <div id="capa2" class="col-lg-offset-2">
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">Parachoque<input hidden="hidden" value="6" class="input-mini"></div>
                    </div>
                    <div id="capa2" class="col-lg-offset-7">
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">Luz Patente<input hidden="hidden" value="10" class="input-mini"></div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">Foco D<input hidden="hidden" value="8" class="input-mini"></div>
                    </div>
                    <div id="capa2" class="col-lg-offset-6">
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">Maletero<input hidden="hidden" value="7" class="input-mini"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div id="capa1" class="col-lg-12">
                        <img class="img-responsive" src="images/partes_vehiculo/prt_arriba.png" style="float: left;">
                    </div>
                    <div id="capa2" class="col-lg-offset-0">
                        <div class="col-lg-12">Techo<input hidden="hidden" value="19" class="input-mini"></div>
                    </div>
                    <div id="capa2" class="col-lg-offset-2">
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">&nbsp;</div>
                        <div class="col-lg-12">Puerta 1</div>
                    </div>
                </div>
            </div>
            
        