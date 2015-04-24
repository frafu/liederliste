# ACHTUNG!
Alle Anleitungen hier beziehen sich rein auf Linux! Wenn sie Windows oder Apple
benutzen, können sie diese Anleitung nicht verwenden!

# Umgang mit Image
## Image
Das Betriebssystem Image ist nicht Teil dieses Repositories. Das Image file kann hier runtergeladen werden:

         http://www.mediafire.com/download/zjne6wkn0lpo54f/liederliste_image.img

Speichern sie das Image in das Verzeichnis

	rasp_image

## Image auf SD Karte spielen
Die SD Karte muss mindestens 8GB groß sein!
Bei mir ist die SDKarte das Device /dev/mmcblk0 - sollte das bei ihnen anders
sein, bitte durch das richtige Device ersetzen!

      sudo dd if=liederliste_image.img of=/dev/mmcblk0 bs=4M
      sudo sync

Sicherheitshalber nach dem dd noch ein sync ausführen um sicher zu gehen, dass
alle Daten auf der SD Karte gespeichert wurden. Anschließend kann die SD
Karte entfernt werden.

## Image Partitionen lokal mounten
Um die Image Partionen lokal zu mounten, führen sie

     ./mountlocal

im Verzeichnis 

     rasp_image 

aus. Die root Partition wird nach root, die data Partition nach data gemountet. Im Laufenden Raspberry ist die data Partition nach `/var/www` gemountet.

# In Betriebnahme
## WLAN
Es muss ein WLAN mit folgender Konfiguration verfügbar sein:

*  ssid: PRTBMWQ
*  passwort: Pwd2PwdGU
*  Protokoll: WPA2, WPA-PSK, TKIP

### Kann das WLAN geändert werden?
Ja, im Image muss in der Partition root die Datei /etc/wpa_supplicant/wpa_supplicant.conf angepasst werden.

## Raspberry in Betrieb nehmen
Die SD Karte in den Raspberry stecken, eine USB WLAN Karte dazu stecken. Per HDMI an einen Monitor verbinden und den Strom anschließen.
Jetzt fährt der Raspberry hoch. Der Bootprozess dauert ca. 2 bis 4 Minuten.
Am Monitor erscheint eine Seite mit der IP Adresse des Raspberries. Diese IP Adresse in einen Browser eintippen.

# Betrieb
## Setup
Als erste im Menüpunkt "Setup" auswählen und den Button "Suche starten" unter der Textbox "Raspberry IP Adressen" klicken. Jetzt werden alle Raspberries gesucht.
Ein Script macht einen Network Scan und sucht alle Hosts mit dem offenen Port 2219.
Alle gefundenen IP Adressen werden in der Textbox eingetragen.
Sollten weniger IP Adressen gefunden werden als Monitore aktiv sind, führen sie diesen Schritt einfach nochmal aus. Es kann manchmal vorkommen, dass nicht sofort alle Raspberries gefunden werden.

## Lieder bearbeiten
Menüpunkt "Eingabe".
Die Eingaben tätigen und auf "Speichern & Verteilen" klicken. Die Einstellunge werden jetzt an alle Raspberries verteilt. Das kann pro Raspberry bis zu 10 Sekunden dauern. Bis die Anzeige auf allen Raspberries synchronisiert ist, können nochmal weitere fünf Sekunden vergehen.
Bei vier Raspberries im Netzwerk sollten nach spätestens 40 Sekunden alle Monitore aktualisiert sein.


