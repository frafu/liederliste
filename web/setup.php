<?php
include("inc/functions.php");
include("inc/header.php");

?>
<div id="setup">
    <h1>Setup</h1>
    <p style="color:red">ACHTUNG: Verändern sie diese Einstellungen nur, wenn sie wissen was sie tun!</p>

    <form id="form">
        <div class="form-group">
          <label for="lineCount">Anzahl der Zeilen:</label>
            <input type="text" class="form-control" style="font-size: 40px; height: 80px; width:120px;"  id="lineCount" name="lineCount" value="<?=$settings->lineCount?>"/>
        </div>
        <div class="form-group">
          <label for="lineCount">Font-Family:</label>
            <input type="text" class="form-control" style="font-size: 20px; height: 40px;"  id="fontFamily" name="fontFamily" value="<?=$settings->fontFamily?>"/>
        </div>

      <div class="form-group">
        <label for="ips">Raspberry IP Adressen</label> (jede IP Adresse in eine Zeile)
          <textarea class="form-control"  id="ips" name="ips" rows="10"><?=$settings->ips?></textarea>
          <a id="btnSearch" style="font-size: 20px;" class="btn btn-info">Suche starten</a>
      </div>
        <a id="btnSave" class="btn btn-success">Speichern</a>
        <a id="btnReset" style="font-size: 20px;" class="btn btn-danger">Werkseinstellungen</a>
    </form>
</div>




</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

<script type="text/javascript">

    function progressBar() {
        var pgrBar=$('#progressbar')
        var prct=parseInt(pgrBar.attr('aria-valuenow'))
        if(!isNaN(prct)) {
            prct += 1
            console.log(prct)
            pgrBar.attr('aria-valuenow', prct)
            pgrBar.css('width', prct + '%')
            window.setTimeout(progressBar, 1000)
        }
    }

    function initPage() {
        $('#btnSearch').click(function() {
            window.setTimeout(progressBar, 1000)
            bootbox.dialog({
                title: "Bitte warten .....",
                message: "<img src='css/spinner.gif'/> Es werden alle verfügbaren Raspberries im Netzwerk gesucht ....." + '<div class="progress">'+
                  '<div id="progressbar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">'+
                  '</div>'+
                '</div>',
                closeButton: false,
                animate: true
            })
            $.get("ajax/getRaspberries.php", $("#form").serialize()).done(function (data) {
                data = JSON.parse(data)
                $('#ips').val(data.ips)
                console.log(data)
                bootbox.hideAll()
            })
        })

        $('#btnSave').click(function() {
            console.log("save...")
            settings.ips=$('#ips').val()
            settings.lineCount=$('#lineCount').val()
            settings.fontFamily=$('#fontFamily').val()
            postSettings(settings, function(data) {
                    console.log("succes");
                    console.log(data);
                    bootbox.hideAll()
                    bootbox.alert("Setup wurde gespeichert")
                },
                function(data) {
                    console.log(data)
                    bootbox.hideAll()
                    bootbox.alert("Ein Fehler ist aufgetreten!")
                }
            )
        })

        $('#btnReset').click(function(e){
            e.preventDefault()
            bootbox.confirm("Auf Werkseinstellungen zurücksetzen?", function(ret) {
                if(ret==true) {
                    location.href="reset.php"
                }
            })
        })

    }
</script>

</body>
</html>
