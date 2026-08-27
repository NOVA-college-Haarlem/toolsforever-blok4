# Tools4ever — TODO

Dit document houdt de status bij van bekende issues in de Tools4ever-starterscode
(Blok 4 eindproject, hergebruikt als vervolgcasus in Blok 5). Zie ook de
Blok 5-leerdoelen voor hoe de openstaande punten hieronder als leerstof terugkomen.

## Gefixt — blocking bugs (voorbereiding op Blok 5)

Deze bugs braken de starter-code al vóór er iets met security/PDO te maken had —
opgelost zodat studenten met een werkende basis het blok in gaan.

- [x] **Rol-mismatch `admin` vs `administrator`** — alle permissie-checks
      (`dashboard.php`, `tools_index.php`, `tools_create.php`,
      `tools_create_process.php`, `users_index.php`, `users_create.php`,
      `users_add_process.php`, `users_detail.php`) vergeleken tegen
      `'administrator'`, terwijl de seed-data en het rol-dropdown `'admin'`
      gebruiken. Hierdoor kon de geseede admin-user nooit een admin-pagina
      openen. Alle checks vergelijken nu tegen `'admin'`.
- [x] **`session_start()`-volgorde in `login-process.php`** — werd alleen in
      het succes-pad aangeroepen; de fail-paden (verkeerd wachtwoord /
      onbekende gebruiker) includeden `header.php` zonder gestarte sessie.
      `session_start()` staat nu bovenaan het bestand.
- [x] **Kapotte formulier-actie in `tools_create.php`** — post'te naar
      `tool_create_process.php` (bestaat niet), nu naar
      `tools_create_process.php`.
- [x] **Kapotte redirect in `tools_create_process.php`** — verwees na succes
      naar `tool_index.php` (bestaat niet), nu naar `tools_index.php`.
- [x] **Prijs-bug bij aanmaken tool** — nieuwe tools sloegen de prijs in euro's
      op, terwijl alle overzicht-/detailpagina's de opgeslagen waarde door 100
      delen (centen-aanname). `tools_create_process.php` vermenigvuldigt de
      prijs nu met 100 bij het opslaan.
- [x] **`search.php` volledig kapot** — query op niet-bestaande kolom `name`
      (moet `tool_name` zijn), `LIKE` zonder `%`-wildcards (alleen exact
      match), `database.php` werd niet altijd geïncludeerd (`$conn` undefined
      buiten de zoek-tak), `$tools` was undefined zonder zoekactie, en er
      stonden losse debug-`echo`'s (sessienaam die nooit bestond, timestamp,
      rowcount) vóór de `<!DOCTYPE html>`. Alles opgeschoond; de
      resultatenweergave (`foreach`-body) is bewust leeg gelaten — dat vullen
      is onderdeel van de zoek-/filter-opdracht in Blok 5.

## Openstaand — bewust laten staan, dit ís de Blok 5-leerstof

Niet aankomen vóór het blok: deze kwetsbaarheden/gaten zijn het onderwerp van
de bijbehorende Blok 5-week.

- [ ] **SQL-injectie overal** (string-interpolatie in alle `*_process.php`,
      `*_delete.php`, `tools_detail.php`, `users_detail.php`, `search.php`)
      → Week 1: PDO & prepared statements.
- [ ] **Plaintext wachtwoorden** (`login-process.php`: `==`-vergelijking,
      `users_add_process.php`: ongehashte opslag) → Week 2-3: `password_hash()`
      / `password_verify()`.
- [ ] **Geen `htmlspecialchars()`** bij output van user-/DB-content (tool- en
      gebruikersnamen etc.) → stored/reflected XSS → Week 2: Security & Update.
- [ ] **Delete via kale `GET`-link, harde `DELETE FROM`** in
      `tools_delete.php`, `users_delete.php`, `brands_delete.php`, geen
      `deleted_at`-kolom → Week 4: Soft Delete.
- [ ] **Winkelmand niet geïmplementeerd** — lege link in `header.php`,
      `add_to_cart.php` bestaat niet, link in `tools_detail.php` verwijst
      ernaar → Week 4 les 2: AJAX-cart zonder page reload.
- [ ] **Geen filtering-opzet** in `search.php` (resultatenweergave leeg) →
      Week 5 les 2: filtering met GET-parameters.
- [ ] **Geen error handling** — `mysqli_query()`-resultaat wordt nergens
      gecontroleerd (bv. `dashboard.php`, `tools_index.php`), geen try/catch,
      geen HTTP-statuscodes → Week 6: Error Handling.

## Nice-to-have — geen blocking bug, wel de moeite waard

- [ ] **Schema-inconsistentie**: `users`-tabel is `latin1_swedish_ci`,
      `tools`/`brands` hebben geen expliciete charset. Normaliseren naar
      `utf8mb4` zodra het schema toch wordt aangeraakt (PDO-migratie is een
      logisch moment).
- [ ] **Geen `UNIQUE` constraint op `users.email`** — dubbele registraties
      zijn nu mogelijk.
- [ ] **Prijsmodel blijft verwarrend**: `tool_price DECIMAL(10,2)` met
      content die centen voorstelt. Overwegen om centen in een `INT` op te
      slaan, of euro's direct in de `DECIMAL`.
- [ ] **Geen Update/Edit-pagina's** (`tools_edit.php`/`users_edit.php`
      staan als comment, "Wijzig" is dode tekst in `tools_index.php` en
      `users_index.php`) — hoort logisch bij Blok 5 Week 2
      ("update-functionaliteit voor meerdere entiteiten").
- [ ] **Hardcoded credentials** in `database.php` en `docker-compose.yaml`
      (`root`/`password`) — prima voor lokale Docker-educatie, eventueel
      aanstippen bij de security-week ("waarom `.env` voor secrets").
- [ ] **`.gitignore` is leeg** — `vendor/` en eventuele lokale env-bestanden
      met echte secrets later niet vergeten toe te voegen.
