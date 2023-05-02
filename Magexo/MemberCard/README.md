# Magexo "členské karty"

### Popis riesenia

Vytvorenie Magento modulu
- namespace: Magexo
- modul: MemberCard
- registracia komponentu (registration.php)
- definovanie dependencies pre modul v composer.json

vytvorenie entity memberdcard
- vytvorenie DB tabulky magexo_membercard_membercard [ db_schema.xml ]
- pridany index na customer_id. Predpokladam, ze pri praci s entitou sa bude vyhladavat primarne podla ID customera.
- pridany Foreign Key Constraint na customer_id na tab. customer_entity aby sa zabezpecila integrita DB. Pri vymazani ustomera sa zmaze aj jeho clenska karta
- resource model interface na komunikaciu s DB
- repozitory interface (repository pattern) na CRUD operacie s entitou

REST API Endpointy
- zadefinovanie endpointov v webapi.xml
- resources, paths a implementacia pre API

Sprava clenskych kariet
- v Magento backende pridana do menu Customer polozka Mamber Cards
- vytvorena grid (list) clenskych kariet
- do listingu je proidany aj stlpec s menom customera na lahsiu identifikaciu komu clenska karta chyba
- vytvoreny formulat na pridavanie / upravu clenskej karty
- na priradenie customera k clenskej karte vytvoreny custom UI component na filtrovanie customerov podla mena
