<?php
include("inc/functions.php");
include("inc/header.php");

?>
<div id="eingabe">
    <h1>Lieder Eingabe:</h1>
    <form id="form" class="form-horizontal">

        <table>
            <thead>
            <tr>
                <th style="width:60px;"></th>
                <th>Zeilen</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <?php
                for($c=0;$c<$settings->lineCount;$c++) {
                    if(count($settings->lines)<=$c) {
                        // element ist noch nicht vorhanden
                        $line = $settings->lines[0];
                        $line->text="";
                        $line->color="#000000";
                        $line->highlight=false;
                        $settings->lines[$c]=$line;
                    }
                    $line = $settings->lines[$c];

                    ?>
                    <tr>
                        <td>
                            <select class="colorselector" name="color<?=$c?>" id="color<?=$c?>">
                                <?php include("inc/colors.php")?>
                            </select>
                        </td><td>
                            <input style="font-size:40px; height:80px;" class="form-control lied" type="text" name="lied<?=$c?>"  id="lied<?=$c?>" value="<?=$line->text?>"/>
                        </td>
                    </tr>
                <?php
                }
            ?>

        </table>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <a style="font-size: 30px; width: 340px;" class="btn btn-default" id="emptyinput" href="#">Alle Felder leeren</a>
              <a style="font-size: 30px; width: 340px;" class="btn btn-default" id="blackinput" href="#">Alle Felder schwarz</a>
              <a style="font-size: 30px; width: 340px;" id="btnSave" class="btn btn-success">Speichern & Verteilen</a>
          </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    function initPage() {
        <?php
            for($i=0;$i<$settings->lineCount;$i++) {
        ?>
        $('#color<?=$i?>').colorselector('setColor', '<?=$settings->lines[$i]->color?>');
        <?php
            }
        ?>

        $('#btnSave').click(function (e) {
            e.preventDefault()
            for (var c = 0; c < settings.lineCount; c++) {
                if (settings.lines[c] === undefined) {
                    settings.lines[c] = {}
                    //color: "", text: "", highlight: false
                    //}
                }
                settings.lines[c].color = $('#color' + c).val()
                settings.lines[c].text = $('#lied' + c).val()
                settings.lines[c].highlight = false
            }
            if (settings.lines.length > settings.lineCount) {
                settings.lines = settings.lines.splice(0, settings.lineCount)
            }
            console.debug(settings)

            postSettings(settings,
                function (data) {
                    console.log("success")
                    console.log(data)
                    bootbox.hideAll()
                    bootbox.dialog({
                        title: "Fertig",
                        message: "Monitore fertig synchronisiert.",
                        buttons: {
                            main: {
                                label: "Schließen",
                                callback: function () {
                                    bootbox.hideAll();
                                }
                            },
                            info: {
                                label: "Highlight Modus",
                                callback: function () {
                                    location.href = "highlight.php"
                                }
                            }
                        },
                        animate: true
                    })
                },
                function (data) {
                    console.log("ERROR")
                    console.log(data)
                    bootbox.hideAll()
                    bootbox.alert("Leider ist ein Fehler aufgetreten!")
                }
            )
        })
        $('#emptyinput').click(function (e) {
            e.preventDefault()
            $('input.lied').val("")
        })

        $('#blackinput').click(function (e) {
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
