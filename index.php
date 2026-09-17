<?php
/* =========================================================
   INDEX.PHP — opleidingspagina voor eerstejaars
   -----------------------------------------------------------
   HOE PAS JE DIT AAN?
   Alle content staat hieronder in simpele PHP-arrays.
   Voeg een regel toe / verwijder een regel / pas tekst aan —
   de pagina past zich automatisch aan. Je hoeft de HTML
   verderop niet aan te raken om tekst te wijzigen.

   Stijl (kleuren, fonts, layout) staat volledig in
   css/style.css — dat bestand raak je hier niet aan.
   De opmaak volgt de Curio-huisstijl: diepblauw + felle
   steunkleuren, ronde hoeken en pil-knoppen.
   ========================================================= */

// ---- 1. Vakken in het eerste jaar ----
$vakken = [
  ["naam" => "Web(Websites)", "beschrijving" => "Je leert bij dit vak dingen zoals html, css en php."],
  ["naam" => "mtu/mtg", "beschrijving" => "mentoruur leer je dingen zoals cv maken en bij mentorgespreken ga je in gesprek met je mentor."],
  ["naam" => "burgerschap", "beschrijving" => "Je leert over burgerschap en maatschappelijke verantwoordelijkheid."],
  ["naam" => "keuzedeel", "beschrijving" => "een vak naar eigen keuze."],
  ["naam" => "challenges", "beschrijving" => "Projectmatig via sprints werken aan een challenge"],
  ["naam" => "masterworks", "beschrijving" => "Losstaande lessen van circa 45-60 minuten over een specifiek onderwerp, gegeven naast de challenge."],
  ["naam" => "loopbaan", "beschrijving" => ""],
  ["naam" => "Engels", "beschrijving" => ""],
  ["naam" => "Nederlands", "beschrijving" => ""],
  ["naam" => "Rekenen", "beschrijving" => ""],
];

// ---- 2. Voorbeeldrooster ----
// Het rooster zelf (data + weergave) staat in het losse bestand
// rooster-widget.php — dat maakt het makkelijk om alleen dát blok te
// kopiëren naar een andere pagina. Hier wordt het bestand ingeladen.
require __DIR__ . '/rooster-widget.php';

// ---- 3. Blokken ----
$blokken = ["Blok A", "Blok B", "Blok C", "Blok D", "Blok E", "Blok F", "Blok G", "Blok H"];

// ---- 4. Foto-carrousel (zet je eigen bestanden in de map /images) ----
$carousel_fotos = [
  "images/nobellaan.png",
  "images/code.png",
  "images/code1.png",
  "images/laptop.jpg",
  "images/nobellaan1.png",
  "images/sd.jpg",
];

// ---- 5. Wat kun je na deze opleiding doen ----
$uitstroom = [
  "HBO-ICT / Informatica",
  "HBO Software Engineering",
  "Junior Software Developer",
  "Junior Full-Stack Developer",
];

// ---- 6. Jaarplanning & vakanties ----
$jaarplanning = [
  "Start schooljaar",
  "Herfstvakantie",
  "Kerstvakantie",
  "Voorjaarsvakantie",
  "Meivakantie",
  "Zomervakantie",
];

// ---- 7. Testimonial(s) — geen namen, geen foto's van studenten ----
$testimonials = [
  ["quote" => "Zet hier een korte, anonieme quote van een (oud-)student over de opleiding.", "auteur" => "Anonieme student, 1e jaar"],
];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Open dag — softwareontwikkelaar | Curio</title>

  <!-- Fonts: Manrope (vette, geometrische koppen zoals Curio) + Inter voor lopende tekst -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Losse CSS-map -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- ============ NAV ============ -->
  <header class="site-header">
    <div class="wrap">
      <div class="logo">curio</div>
      <ul class="nav-links">
        <li><a href="#vakken">Vakken</a></li>
        <li><a href="#rooster">Rooster</a></li>
        <li><a href="#versnellen">Versnellen</a></li>
        <li><a href="#na-opleiding">Na de opleiding</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <a href="#contact" class="btn-outline">Open dag</a>
    </div>
  </header>

  <!-- ============ HERO (met achtergrondvideo) ============ -->
  <section class="hero">
    <!-- Achtergrondvideo: zet je bestand in /images en pas de src hieronder aan.
         poster = het beeld dat getoond wordt zolang de video nog laadt. -->
    <video class="hero-video" autoplay muted loop playsinline poster="images/hero-poster.png">
      <source src="videos/opleiding.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>

    <div class="wrap hero-content">
      <p class="eyebrow">Opleiding &middot; eerste jaar</p>
      <h1>Zo ziet je eerste jaar eruit</h1>
      <p class="lead">Korte, wervende introductie van de opleiding: wat maakt dit eerste jaar bijzonder, en waarom past het bij jou.</p>
      <a href="#contact" class="btn">Meld je aan voor de open dag</a>
    </div>
  </section>

  <!-- ============ VAKKEN ============ -->
  <section id="vakken">
    <div class="wrap">
      <p class="eyebrow">Sectie 1</p>
      <div class="section-intro">
        <h2>Vakken in het eerste jaar</h2>
        <p>Een overzicht van de vakken die je dit jaar krijgt, met een korte beschrijving.</p>
      </div>
      <div class="subjects-grid">
        <?php foreach ($vakken as $vak): ?>
          <div class="subject-card">
            <h3><?= htmlspecialchars($vak['naam']) ?></h3>
            <p><?= htmlspecialchars($vak['beschrijving']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============ ROOSTER + BLOKKEN ============ -->
  <section id="rooster">
    <div class="wrap">
      <div>
        <p class="eyebrow">Sectie 2</p>
        <h2>Voorbeeldrooster</h2>
        <p>Een voorbeeld van hoe een lesweek in het eerste jaar eruitziet (geen echte namen van studenten). Op woensdag en vrijdag lopen sommige lessen gelijktijdig — die staan naast elkaar binnen dezelfde dag.</p>
        <?= render_rooster_widget() ?>
      </div>

      <div id="versnellen" class="section-block-spaced">
        <p class="eyebrow">Sectie 3</p>
        <h2>Indeling van de blokken</h2>
        <p>Het schooljaar is opgedeeld in blokken.</p>
        <div class="blocks-row">
          <?php foreach ($blokken as $blok): ?>
            <div class="block-chip"><?= htmlspecialchars($blok) ?></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ VERSNELLEN ============ -->
  <section>
    <div class="wrap">
      <p class="eyebrow">Sectie 4</p>
      <div class="section-intro">
        <h2>Mogelijkheid om te versnellen</h2>
        <p>In overleg is het mogelijk om je opleiding sneller te doorlopen.</p>
      </div>

      <div class="path-row">
        <div class="path-node">Jaar 1</div>
        <div class="path-line"></div>
        <div class="path-node">Jaar 2</div>
        <div class="path-line"></div>
        <div class="path-node">Jaar 3</div>
        <div class="path-line"></div>
        <div class="path-node">Diploma</div>
      </div>

      <div class="path-row">
        <div class="path-node accent">Jaar 1</div>
        <div class="path-line"></div>
        <div class="path-node accent">Jaar 2 + 3 samen</div>
        <div class="path-line"></div>
        <div class="path-node accent">Diploma <span class="tag-pill">versneld</span></div>
      </div>
    </div>
  </section>

  <!-- ============ FOTO-CAROUSEL ============ -->
  <section>
    <div class="wrap">
      <p class="eyebrow">Sectie 5</p>
      <div class="section-intro">
        <h2>Sfeerbeelden</h2>
        <p>Een impressie van de opleiding.</p>
      </div>
      <div class="carousel">
        <?php foreach ($carousel_fotos as $foto): ?>
          <div class="carousel-item">
            <img src="<?= htmlspecialchars($foto) ?>" alt="Sfeerbeeld opleiding" onerror="this.parentElement.style.background='#EDE9FF'; this.style.display='none'">
          </div>
        <?php endforeach; ?>
      </div>
      <div class="dots">
        <?php foreach ($carousel_fotos as $i => $foto): ?>
          <div class="dot<?= $i === 0 ? ' active' : '' ?>"></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============ NA DE OPLEIDING ============ -->
  <section id="na-opleiding">
    <div class="wrap">
      <p class="eyebrow">Sectie 6</p>
      <div class="section-intro">
        <h2>Wat kun je hierna gaan doen</h2>
        <p>Vervolgopleidingen en beroepsmogelijkheden na deze opleiding.</p>
      </div>
      <div class="outcomes-row">
        <?php foreach ($uitstroom as $optie): ?>
          <div>
            <div class="outcome-icon"></div>
            <p><?= htmlspecialchars($optie) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============ JAARPLANNING & VAKANTIES ============ -->
  <section>
    <div class="wrap">
      <p class="eyebrow">Sectie 7</p>
      <div class="section-intro">
        <h2>Jaarplanning &amp; vakanties</h2>
        <p>De belangrijkste momenten van het komende schooljaar.</p>
      </div>
      <div class="timeline">
        <?php foreach ($jaarplanning as $moment): ?>
          <div class="t-point">
            <div class="t-dot"></div>
            <?= htmlspecialchars($moment) ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ============ HUISWERK / SFEER / GROEPEN ============ -->
  <section>
    <div class="wrap">
      <p class="eyebrow">Sectie 8</p>
      <div class="section-intro">
        <h2>Huiswerk, sfeer &amp; groepswerk</h2>
      </div>
      <div class="info-grid">
        <div class="info-card">
          <h3>Huiswerk</h3>
          <p>Korte uitleg over hoeveel huiswerk je gemiddeld krijgt en hoe dat werkt.</p>
        </div>
        <div class="info-card">
          <h3>Sfeer op de afdeling</h3>
          <p>Korte uitleg over de sfeer tussen studenten en docenten op de afdeling.</p>
        </div>
        <div class="info-card">
          <h3>Werken in groepen</h3>
          <p>Korte uitleg over hoe groepswerk en samenwerking eruitzien in het eerste jaar.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ ZAK/SLAAG-REGELING ============ -->
  <section>
    <div class="wrap">
      <p class="eyebrow">Sectie 9</p>
      <h2>Zak-/slaagregeling bij de generieke vakken</h2>
      <div class="rule-box">
        <p style="margin:0;">Leg hier kort en helder uit hoe de zak-/slaagregeling werkt voor de generieke vakken.</p>
      </div>
    </div>
  </section>

  <!-- ============ TESTIMONIAL ============ -->
  <section>
    <div class="wrap">
      <p class="eyebrow">Sectie 10</p>
      <h2>Wat studenten van de opleiding vinden</h2>
      <?php foreach ($testimonials as $t): ?>
        <div class="quote-box">
          <p class="quote-text">&ldquo;<?= htmlspecialchars($t['quote']) ?>&rdquo;</p>
          <div class="quote-author">
            <div class="avatar"></div>
            <span><?= htmlspecialchars($t['auteur']) ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- ============ FOOTER ============ -->
  <footer id="contact">
    <div class="wrap">
      <div>
        <div class="logo">curio</div>
        <p style="margin-top:12px;">Korte introductiezin over de opleiding of school.</p>
      </div>
      <div>
        <h4>Navigatie</h4>
        <ul>
          <li><a href="#vakken">Vakken</a></li>
          <li><a href="#rooster">Rooster</a></li>
          <li><a href="#na-opleiding">Na de opleiding</a></li>
        </ul>
      </div>
      <div>
        <h4>Contact</h4>
        <ul>
          <li><a href="mailto:info@school.nl">info@school.nl</a></li>
          <li><a href="tel:0000000000">000 - 000 00 00</a></li>
        </ul>
      </div>
    </div>
  </footer>

</body>
</html>