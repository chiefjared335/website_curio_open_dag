OPLEIDINGSPAGINA — TEMPLATE
============================

BESTANDEN
---------
index.php        de pagina zelf (HTML + kleine stukjes PHP)
css/style.css     alle opmaak: kleuren, fonts, layout
images/           zet hier je eigen foto's neer

TEKST AANPASSEN
----------------
Bovenaan index.php staan een paar simpele lijstjes (PHP-arrays), bv.:

  $vakken = [
    ["naam" => "Vaknaam 1", "beschrijving" => "..."],
    ...
  ];

Wil je een vak toevoegen of verwijderen? Voeg een regel toe of haal er een
weg — de pagina past zich vanzelf aan. Hetzelfde geldt voor het rooster,
de vakantiedata, de uitstroom-mogelijkheden en de quote(s).

Losse tekst (zoals de hero-tekst of sectie-teksten) pas je direct aan in de
HTML verderop in het bestand.

FOTO'S TOEVOEGEN
------------------
Zet je bestanden in de map /images en verwijs ernaar, bv.:
  images/hero.jpg          -> hoofdfoto bovenaan
  images/foto-1.jpg, -2, -3 -> de carrousel
Zolang er geen bestand staat, laat de pagina netjes een lege grijze
placeholder zien in plaats van een kapot icoontje.

Belangrijk: gebruik geen foto's waarop studenten of docenten herkenbaar
in beeld zijn.

STIJL AANPASSEN
-----------------
Open css/style.css. Bovenin staat een blok met :root { ... } — dat zijn
de kleuren en fonts. Pas bijvoorbeeld --color-accent aan voor een andere
hoofdkleur, en de hele site verandert mee.

Fonts wisselen? Pas de Google Fonts-link in de <head> van index.php aan,
en de namen bij --font-heading / --font-body in style.css.

HOSTEN
-------
Dit bestand heet expres index.php (niet .html) zodat een normale
PHP-hosting het meteen als pagina herkent. Zet de hele map (index.php,
css/, images/) op je server; er is verder niets te installeren.
