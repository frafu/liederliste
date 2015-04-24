bootbox.setLocale("de")
var settings=[];
function postSettings(settings, success, error) {
    bootbox.dialog({
        title: "Bitte warten .....",
        message: "<img src='css/spinner.gif'/> Es wird die Anzeige erzeugt und an alle angeschlossenen Anzeigegeräte übertragen .....",
        closeButton: false,
        animate: true
    })


    $.ajax({
        type: "post",
        url: "ajax/setSettings.php",
        data: {
            settings: JSON.stringify(settings)
        },
        success: success,
        error: error
    })
}

$(document).ready(function() {
    $.ajax({
        url: "./settings/settings.json",
        async: true,
        type: "get",
        success: function(data){
            settings=data
            console.log("settings")
            console.log(settings)
            initPage()
        }
    })
})

