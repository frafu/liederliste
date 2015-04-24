<?php
include("inc/functions.php");
include("inc/header.php");
?>
<div id="eingabe">
    <h1>Einstellungen:</h1>
    <form id="form" class="form-horizontal">

        <div class="form-group">
            <label class="control-label col-sm-2" for="backgroundColor">Hintergrundfarbe:</label>
            <div class="col-sm-10">
                <select class="form-control colorselector" id="backgroundColor">
                    <?php include("inc/colorsgray.php")?>
                    <?php include("inc/colors.php")?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="bg">Textausrichtung:</label>
            <div class="col-sm-10">
                <select style="font-size:40px; height:80px;"  class="form-control" id="textAlign">
                    <option value="left">Linksbündig</option>
                    <option value="mittig">Mittig</option>
                    <option value="rechtsbündig">Rechtsbündig</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="bg">Textgröße:</label> (zwischen 100 und 200 is sinnvoll)
            <div class="col-sm-10">
                <input style="font-size:40px; height:80px; width:180px;"  type="text" id="fontSize" value="<?=$settings->fontSize?>"/>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="bg">Highlight:</label>
            <div class="col-sm-10">
                <textarea style="font-size:20px; height:200px;" class="form-control" id="highlight"><?=$settings->highlight?></textarea>
            </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <a style="font-size: 34px;" id="btnSave" class="btn btn-success">Speichern & Verteilen</a>
          </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    function initPage() {
        $('#backgroundColor').colorselector('setColor', '<?=$settings->backgroundColor?>');

        $('#btnSave').click(function(e) {
            e.preventDefault()
                settings.textAlign=$('#textAlign').val();
                settings.fontSize=$('#fontSize').val();
                settings.backgroundColor=$('#backgroundColor').val();
                settings.highlight=$('#highlight').val();

                postSettings(settings,
                    function(data) {
                        console.log("success")
                        console.log(data)
                        bootbox.hideAll()
                        bootbox.alert("Fertig")
                    },
                    function(data) {
                        console.log("ERROR")
                        console.log(data)
                        bootbox.hideAll()
                        bootbox.alert("Leider ist ein Fehler aufgetreten!")
                    }
                )
        })
        $('#emptyinput').click(function(e) {
            e.preventDefault()
            $('input.lied').val("")
        })

        $('#blackinput').click(function(e) {
            e.preventDefault()
            $('.colorselector').colorselector('setColor', '#000000')
        })

    }
</script>

</div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
