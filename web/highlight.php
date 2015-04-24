<?php
include("inc/functions.php");
include("inc/header.php");

?>
<div id="eingabe">
    <h1>Highlight:</h1>
    <form id="form" class="form-horizontal">

        <table style="height:100%; font-size: 40px;">
            <?php
                $c=0;
                foreach($settings->lines as $line) {
                    if(trim($line->text)!="") {
                        $pointer=$line->highlight==true?"<img src='./img/pointer.png'/>":"";
                        ?>
                        <tr>
                            <td style="width: 10px"><?=$pointer?></td>
                            <td onclick="highlightLine(<?=$c?>)" style="cursor: pointer; border: 2px solid black; width: 100%; <?= $line->color ?>">
                                <?= $line->text ?>
                            </td>
                        </tr>
                        <?php
                    }
                    $c++;
                }
            ?>

        </table>

    </form>
</div>


<script type="text/javascript">
    function highlightLine(id) {
        console.log(id)
        if(settings.lines[id].highlight==true) {
            settings.lines[id].highlight=false
        } else {
            $.each(settings.lines, function (idx, item) {
                item.highlight = false
            })
            settings.lines[id].highlight = true
        }
        postSettings(settings,
            function(data) {
                console.log("success")
                console.log(data)
                bootbox.hideAll()
                location.reload()

            },
            function(data) {
                console.log("ERROR")
                console.log(data)
                bootbox.hideAll()
                bootbox.alert("Leider ist ein Fehler aufgetreten!")
            }
        )
    }
    function initPage(){


        $('#btnSave').click(function(e) {
            e.preventDefault()
                for(var c=0;c<5;c++) {
                    settings.lines[c].color=$('#color'+c).val()
                    settings.lines[c].text=$('#lied'+c).val()
                }
                console.debug(settings)
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
