<?php
require_once(dirname(__FILE__) . '/../../../../../core/php/core.inc.php');
include_file('core', 'authentification', 'php');

if (!isConnect()) {
    throw new Exception('401 Unauthorized');
}
?>

<div portNumber="#portNumber#">
    <div class="cmd digiImpulsion">
        <input type="text" class="cmdAttr form-control" key="id" value="" style="display: none;"/>
        <input type="text" class="cmdAttr form-control" key="type" value="info" style="display: none;"/>
        <input type="text" class="cmdAttr form-control" key="subType" value="other" style="display: none;"/>
        <input type="text" class="cmdAttr form-control" key="configuration" subkey="mode" value="?" style="display: none;"/>
        <input type="text" class="cmdAttr form-control" key="configuration" subkey="type" value="i" style="display: none;"/>

        <div class="form-group">
            <label class="col-lg-2 control-label" >Nom</label>
            <div class="col-lg-2">
                <input type="text" class="cmdAttr form-control" key="name" value="Impulsion"/>
            </div>
            <label class="col-lg-2 control-label" >Historiser</label>
            <div class="col-lg-1">
                <input class="cmdAttr" key="isHistorized" type="checkbox" />
            </div>
            <label class="col-lg-2 control-label" >Evenement seulement</label>
            <div class="col-lg-1">
                <input class="cmdAttr" key="eventOnly" type="checkbox" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label" >Formule de calcul</label>
            <div class="col-lg-2">
                <input type="text" class="cmdAttr form-control" key="configuration" subkey="calcul" value="#V#" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label" >Unité</label>
            <div class="col-lg-2">
                <input type="text" class="cmdAttr form-control" key="unite" value="" />
            </div>
        </div>
    </div> 

    <script>
        var cmdData = ('#cmdData#' != '') ? jQuery.parseJSON('#cmdData#') : null;
        if (cmdData != null) {
            for (var i in cmdData) {
                var cmd = null;
                if (cmdData[i].configuration.type == 'i') {
                    cmd = $('div[portNumber=#portNumber#] .digiImpulsion.cmd');
                }
                if (cmd != null) {
                    cmd.attr('enable', 1);
                    for (var key in cmdData[i]) {
                        if (is_array(cmdData[i][key]) || is_object(cmdData[i][key])) {
                            for (var subkey in cmdData[i][key]) {
                                cmd.find('.cmdAttr[key="' + key + '"][subkey="' + subkey + '"]').value(cmdData[i][key][subkey]);
                            }
                        } else {
                            cmd.find('.cmdAttr[key="' + key + '"]').value(cmdData[i][key]);
                        }
                    }
                }
            }
        }
    </script>

</div>