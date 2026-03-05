# Instruktioner: Fixa GD-tillägget för bildbehandling

## Problem
Om du får felmeddelandet `Call to undefined function imagecreatetruecolor()` saknas PHP:s GD-tillägg i din dev container.

## ⚡ Snabblösning (EN KOMMANDO)

Kör detta i terminalen:
```bash
bash <(curl -s https://raw.githubusercontent.com/hkrdigitaldesign/php/main/fix-gd.sh)
```

Eller om du redan har projektet klonat:
```bash
./fix-gd.sh
```

Efter att scriptet kört klart:
1. Tryck `F1` (eller `Ctrl+Shift+P`)
2. Skriv: `Dev Containers: Rebuild Container`
3. Vänta 1-2 minuter
4. Klar! ✅

---

## 📋 Manuell lösning (om du vill göra det själv)

### Steg 1: Uppdatera Dockerfile
Öppna filen `.devcontainer/Dockerfile` och **ersätt** hela innehållet med:

```dockerfile
# =============================================================================
# DOCKERFILE - Bygger utvecklingsmiljön för PHP
# =============================================================================
# Den här filen beskriver hur vår utvecklingscontainer ska byggas.
# Tänk på det som ett recept för att skapa en virtuell dator med allt vi behöver.
# =============================================================================

# Basimage: Startar från Microsofts färdiga PHP 8.3-miljö för VS Code
# Detta ger oss PHP förinstallerat med vanliga verktyg
FROM mcr.microsoft.com/devcontainers/php:1-8.3

# Installerar systembibliotek som behövs för bildbehandling (GD-tillägget)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    && rm -rf /var/lib/apt/lists/*

# Konfigurerar och installerar GD-tillägget för bildbehandling
# GD används för att beskära, ändra storlek och manipulera bilder
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd

# Installerar PHP-tillägg för MySQL-databasanslutning
# pdo_mysql = Modern säker metod för databasanrop
# mysqli = Äldre metod, fortfarande vanlig i tutorials
RUN docker-php-ext-install pdo_mysql mysqli

# Node.js installeras via devcontainer features i devcontainer.json
# Detta ger en mer stabil installation utan GPG-nyckelproblem
```

### Steg 2: Bygg om containern
1. Tryck `F1` (eller `Ctrl+Shift+P` på Windows/Linux, `Cmd+Shift+P` på Mac)
2. Skriv: `Dev Containers: Rebuild Container`
3. Välj det alternativet och vänta (tar ca 1-2 minuter)

### Steg 3: Verifiera
Efter ombyggnaden, kör detta kommando i terminalen för att kontrollera:
```bash
php -m | grep gd
```

Om du ser `gd` i svaret fungerar allt! ✓

## Vad gör GD-tillägget?
GD-tillägget ger PHP funktioner för att:
- Skapa och redigera bilder (JPEG, PNG, GIF, WebP)
- Ändra storlek på bilder
- Beskära bilder
- Lägga till text på bilder
- Och mycket mer

Funktioner som `imagecreatetruecolor()`, `imagecreatefromjpeg()`, `imagecopyresampled()` m.fl. kommer från GD-tillägget.
