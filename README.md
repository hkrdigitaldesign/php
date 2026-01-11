# PHP utvecklingsmiljö

En färdig utvecklingsmiljö för PHP med MySQL och phpMyAdmin.

## Kom igång

1. Klicka på **"Use this template"** → **"Open in a codespace"**
2. Vänta medan miljön byggs (ca 1-2 minuter första gången)
3. Klicka på **PORTS**-fliken längst ner
4. Klicka på länken vid port **3000** för att öppna din webbsida

## Tjänster

| Port | Tjänst | Beskrivning |
|------|--------|-------------|
| 3000 | PHP App | Din webbsida – öppna denna för att se din kod |
| 8080 | phpMyAdmin | Hantera databasen via webbläsaren |

## Databasuppgifter

Använd dessa uppgifter för att ansluta till databasen:

| Inställning | Värde |
|-------------|-------|
| Server | `mysql` |
| Databas | `mydb` |
| Användare | `root` |
| Lösenord | `root` |

## 📁 Filstruktur
```
/
├── index.php          ← Startsida (redigera denna)
├── db.php             ← Databasanslutning (inkludera i dina filer)
└── .devcontainer/     ← Konfiguration (rör ej)
```

## Tips

- Spara en fil → webbsidan uppdateras automatiskt
- Använd `require_once 'db.php';` för att ansluta till databasen
- Öppna phpMyAdmin (port 8080) för att skapa tabeller och se data

## Problem?

- **Sidan laddas inte?** → Kolla att du öppnar rätt port (3000)
- **Databasfel?** → Kontrollera att MySQL hunnit starta (vänta 30 sek)
- **Ändringarna syns inte?** → Ladda om sidan (Cmd+R / Ctrl+R)
