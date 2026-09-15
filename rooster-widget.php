<?php
/* =====================================================================
   ROOSTER-WIDGET.PHP — kopieer dit HELE bestand naar je eigen pagina
   ---------------------------------------------------------------------
   Dit bestand is bewust zelfstandig: de stijl (CSS) zit ingebouwd in de
   functie zelf (scoped onder .rooster-widget), dus je hoeft niets aan
   je eigen stylesheet toe te voegen en niets te koppelen.

   GEBRUIK IN JE EIGEN PAGINA
   ---------------------------------------------------------------------
   1) Plak dit hele bestand (of require/include het):
        <?php require 'rooster-widget.php'; ?>
   2) Roep de functie aan op de plek waar het rooster moet komen:
        <?php echo render_rooster_widget(); ?>

   INHOUD AANPASSEN
   ---------------------------------------------------------------------
   Scroll naar "DATA HIERONDER AANPASSEN". Elke dag (Ma t/m Vr) heeft
   één of meer "lanes" (kolommen binnen die dag, voor lessen die
   gelijktijdig plaatsvinden). Voeg een les toe/verwijder een les door
   een regel toe te voegen of weg te halen — de blokjes worden
   automatisch op de juiste tijd/hoogte gezet.
   ===================================================================== */

function render_rooster_widget() {

  // ---- Instellingen van het rooster ----
  $start   = 8 * 60;     // rooster begint om 08:00
  $einde   = 16.5 * 60;  // rooster eindigt om 16:30
  $schaal  = 1.2;        // pixels per minuut (bepaalt de hoogte)
  $uren    = ["08:00","09:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00"];

  // Zet "08:30-09:30" om naar een top/hoogte in pixels
  $positie = function ($tijd) use ($start, $schaal) {
    [$van, $tot] = array_map('trim', explode('-', $tijd));
    [$vh, $vm] = array_map('intval', explode(':', $van));
    [$th, $tm] = array_map('intval', explode(':', $tot));
    $van_min = $vh * 60 + $vm - $start;
    $tot_min = $th * 60 + $tm - $start;
    return [
      'top'    => round($van_min * $schaal),
      'height' => round(($tot_min - $van_min) * $schaal),
    ];
  };

  $hoogte = round(($einde - $start) * $schaal);

  // ===================================================================
  // DATA HIERONDER AANPASSEN
  // Elke dag heeft "lanes": meestal 1 lane, maar bij gelijktijdige
  // lessen (zoals op wo/vr hieronder) meerdere lanes naast elkaar.
  // ===================================================================
  $dagen = [
    [
      "dag" => "Ma",
      "lanes" => [
        [
          ["titel" => "Mtu", "groep" => "2-3", "tijd" => "08:30-09:30", "naam" => "S. van der Steen", "lokaal" => "RN323 - THW350", "klas" => "R-SOD-SD4O26A"],
          ["titel" => "Fundament 1: WEB", "groep" => "4-6", "tijd" => "09:30-11:15", "naam" => "M. de Jong", "lokaal" => "RN215a - THW350", "klas" => "R-SOD-SD4O26A"],
          ["titel" => "Fundament 1: WEB", "groep" => "7-9", "tijd" => "11:15-12:45", "naam" => "J. Veeke", "lokaal" => "RN225 - THW350", "klas" => "R-SOD-SD4O26A"],
        ],
      ],
    ],
    [
      "dag" => "Di",
      "lanes" => [
        [
          ["titel" => "Bu", "groep" => "2-3", "tijd" => "08:30-09:30", "naam" => "M. Leijs", "lokaal" => "RN215a - THW350", "klas" => "R-SOD-SD4O26A"],
          ["titel" => "Fundament 1: WEB", "groep" => "4-6", "tijd" => "09:30-11:15", "naam" => "J. Veeke", "lokaal" => "RN218 - THW350", "klas" => "R-SOD-SD4O26A"],
          ["titel" => "Fundament 1: WEB", "groep" => "8-9", "tijd" => "11:45-12:45", "naam" => "E. Boekhoudt", "lokaal" => "RN225 - THW350", "klas" => "R-SOD-SD4O26A"],
        ],
      ],
    ],
    [
      "dag" => "Wo",
      "lanes" => [
        [ // lane 1: ochtend-Challenges
          ["titel" => "Challenges", "groep" => "4-10", "tijd" => "09:30-13:15", "naam" => "E. Boekhoudt +2", "lokaal" => "RN216_A - THW350 +2", "klas" => "R-SOD-SD4O26A"],
        ],
        [ // lane 2: middag-Challenges (naast Masterclass)
          ["titel" => "Challenges", "groep" => "12-16", "tijd" => "13:45-16:30", "naam" => "C. W...", "lokaal" => "RN216_...", "klas" => "R-SOD-SD4O26A ..."],
        ],
        [ // lane 3: Masterclass (naast middag-Challenges)
          ["titel" => "Masterclass", "groep" => "15-16", "tijd" => "15:30-16:30", "naam" => "J. va...", "lokaal" => "RN224 - ...", "klas" => "R-SOD-SD4O26A ..."],
        ],
      ],
    ],
    [
      "dag" => "Do",
      "lanes" => [
        [
          ["titel" => "Re", "groep" => "5-6", "tijd" => "10:00-11:15", "naam" => "J. Veeke", "lokaal" => "RN224 - THW350", "klas" => "R-SOD-SD4O26A"],
          ["titel" => "Fundament 1: WEB", "groep" => "7-9", "tijd" => "11:15-12:45", "naam" => "M. de Jong", "lokaal" => "RN219 - THW350", "klas" => "R-SOD-SD4O26A"],
          ["titel" => "Ne", "groep" => "11-13", "tijd" => "13:15-14:45", "naam" => "J. van Gils", "lokaal" => "RN225 - THW350", "klas" => "R-SOD-SD4O26A"],
        ],
      ],
    ],
    [
      "dag" => "Vr",
      "lanes" => [
        [ // lane 1: ochtend Mtg + Challenges
          ["titel" => "Mtg", "groep" => "2", "tijd" => "08:30-09:00"],
          ["titel" => "Challenges", "groep" => "3-9", "tijd" => "09:00-12:45", "naam" => "E. Boekhoudt +2", "lokaal" => "RN216_A - THW350 +1", "klas" => "R-SOD-SD4O26A +2"],
        ],
        [ // lane 2: middag-Challenges (naast Masterclass)
          ["titel" => "Challenges", "groep" => "11-15", "tijd" => "13:15-16:00", "naam" => "N. P...", "lokaal" => "RN216_A..."],
        ],
        [ // lane 3: Masterclass (naast middag-Challenges)
          ["titel" => "Masterclass", "groep" => "11-12", "tijd" => "13:15-14:15", "naam" => "F. v...", "lokaal" => "RN215a - ..."],
        ],
      ],
    ],
  ];
  // ===================================================================
  // EINDE DATA — hieronder alleen opmaak/rendering, niet nodig om aan
  // te passen voor tekstuele wijzigingen.
  // ===================================================================

  ob_start();
  ?>
  <div class="rooster-widget">
    <style>
      /* Alles hieronder is expres genest onder .rooster-widget, zodat het
         niet botst met bestaande CSS-classes op je eigen pagina. */
      .rooster-widget{ font-family: Inter, Arial, sans-serif; }
      .rooster-widget .rt-card{
        background: #15171b;
        border-radius: 8px;
        padding: 16px 20px 24px;
        overflow-x: auto;
      }
      .rooster-widget .rt-head-row,
      .rooster-widget .rt-body{
        display: flex;
        min-width: 1120px; /* voorkomt te smalle kolommen; scrollt op mobiel */
      }
      .rooster-widget .rt-time-spacer{ flex: 0 0 52px; }
      .rooster-widget .rt-days-labels{
        display: flex;
        flex: 1;
        gap: 8px;
      }
      .rooster-widget .rt-day-label{
        flex: 1;
        min-width: 210px;
        text-align: center;
        font-size: .8rem;
        font-weight: 600;
        color: #e7e8ea;
        padding-bottom: 8px;
        margin-bottom: 8px;
        border-bottom: 1px solid #2a2d33;
      }
      .rooster-widget .rt-body{ position: relative; }
      .rooster-widget .rt-times{
        position: relative;
        flex: 0 0 52px;
        width: 52px;
      }
      .rooster-widget .rt-hour-label{
        position: absolute;
        left: 0;
        transform: translateY(-50%);
        font-size: .72rem;
        color: #9a9fa6;
        font-variant-numeric: tabular-nums;
      }
      .rooster-widget .rt-days{
        display: flex;
        flex: 1;
        gap: 8px;
        position: relative;
        /* horizontale uurlijnen: elke 72px = 1 uur bij schaal 1.2 */
        background-image: repeating-linear-gradient(
          to bottom,
          #23262c 0, #23262c 1px,
          transparent 1px, transparent 72px
        );
      }
      .rooster-widget .rt-day{
        flex: 1;
        min-width: 210px;
        position: relative;
      }
      .rooster-widget .rt-day-lanes{
        display: flex;
        gap: 4px;
        height: 100%;
        position: relative;
      }
      .rooster-widget .rt-lane{
        flex: 1;
        min-width: 0;
        position: relative;
      }
      .rooster-widget .rt-event{
        position: absolute;
        left: 2px;
        right: 2px;
        background: #1f2329;
        border: 1px solid #34383f;
        border-radius: 4px;
        padding: 6px 7px;
        overflow: hidden;
      }
      .rooster-widget .rt-title{
        font-size: .74rem;
        font-weight: 600;
        color: #f4f4f2;
        margin-bottom: 2px;
        line-height: 1.2;
      }
      .rooster-widget .rt-sub{
        font-size: .65rem;
        color: #c7cad0;
        margin-bottom: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
      .rooster-widget .rt-teacher{
        display: flex;
        justify-content: space-between;
        gap: 4px;
        font-size: .62rem;
        color: #c7cad0;
        white-space: nowrap;
        overflow: hidden;
      }
      .rooster-widget .rt-teacher span:last-child{ text-overflow: ellipsis; overflow: hidden; }
      .rooster-widget .rt-klas{
        font-size: .6rem;
        color: #85898f;
        margin-top: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }
    </style>

    <div class="rt-card">

      <!-- Dagkoppen Ma t/m Vr -->
      <div class="rt-head-row">
        <div class="rt-time-spacer"></div>
        <div class="rt-days-labels">
          <?php foreach ($dagen as $d): ?>
            <div class="rt-day-label"><?= htmlspecialchars($d['dag']) ?></div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Uren + lessen -->
      <div class="rt-body" style="height: <?= $hoogte ?>px;">

        <div class="rt-times">
          <?php foreach ($uren as $uur): $p = $positie("$uur-$uur"); ?>
            <div class="rt-hour-label" style="top: <?= $p['top'] ?>px;"><?= $uur ?></div>
          <?php endforeach; ?>
        </div>

        <div class="rt-days">
          <?php foreach ($dagen as $d): ?>
            <div class="rt-day">
              <div class="rt-day-lanes">
                <?php foreach ($d['lanes'] as $lane): ?>
                  <div class="rt-lane">
                    <?php foreach ($lane as $les): $p = $positie($les['tijd']); ?>
                      <div class="rt-event" style="top: <?= $p['top'] ?>px; height: <?= $p['height'] ?>px;">
                        <div class="rt-title"><?= htmlspecialchars($les['titel']) ?></div>
                        <div class="rt-sub"><?= htmlspecialchars($les['groep']) ?> | <?= htmlspecialchars($les['tijd']) ?></div>
                        <?php if (!empty($les['naam'])): ?>
                          <div class="rt-teacher">
                            <span><?= htmlspecialchars($les['naam']) ?></span>
                            <span><?= htmlspecialchars($les['lokaal'] ?? '') ?></span>
                          </div>
                        <?php endif; ?>
                        <?php if (!empty($les['klas'])): ?>
                          <div class="rt-klas"><?= htmlspecialchars($les['klas']) ?></div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>
  <?php
  return ob_get_clean();
}
