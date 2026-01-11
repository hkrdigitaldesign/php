# =============================================================================
# DOCKERFILE - Bygger utvecklingsmiljön för PHP
# =============================================================================
# Den här filen beskriver hur vår utvecklingscontainer ska byggas.
# Tänk på det som ett recept för att skapa en virtuell dator med allt vi behöver.
# =============================================================================

# Basimage: Startar från Microsofts färdiga PHP 8.3-miljö för VS Code
# Detta ger oss PHP förinstallerat med vanliga verktyg
FROM mcr.microsoft.com/devcontainers/php:8.3

# Installerar Node.js version 20 (LTS = Long Term Support)
# Node.js behövs om du vill använda npm-paket eller bygga frontend
# curl hämtar installationsskriptet, bash kör det, sedan installeras nodejs
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Installerar PHP-tillägg för MySQL-databasanslutning
# pdo_mysql = Modern säker metod för databasanrop
# mysqli = Äldre metod, fortfarande vanlig i tutorials
RUN docker-php-ext-install pdo_mysql mysqli

# Verifierar att Node.js och npm installerades korrekt
# Detta skriver ut versionsnummer i loggfilen
RUN node --version && npm --version