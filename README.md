PHP-temperature-XML-and-attachment-to-php-mail

Datei 1 - Ausgangslage:
Wir benötigen eine PHP Datei die einmalig 30 Temperaturen in eine Textdatei schreibt. Die Temperatur soll per Zufall zwischen 20 Grad und 40 Grad ermittelt werden.
Es sollen die Werte pipe-separiert in eine Textdatei angehangen werden. Beispiel: Köln|35
 
Datei 2 - Daten erweitern
Formular
                Ort (Selectbox für 3-4 beliebige Städte)
                Temperatur (Zahl)
               
In dem Formular soll für die Stadt Köln (oder andere Städte) die Temperaturen ergänzt werden.
 
Datei 3 - Auswertung
Es soll für eine per GET Parameter definierte Stadt eine XML Datei generiert werden und am Ende eine Email mit Anhang verschickt werden. In der E-Mail steht als Text dann noch die Durchschnittstemperatur, die niedrigste und die höchste Temperatur der ganzen Werte.
