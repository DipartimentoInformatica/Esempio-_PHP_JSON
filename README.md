# Sistema di Login e Registrazione in PHP con JSON e Bootstrap

Questo progetto implementa un semplice sistema di autenticazione utente utilizzando PHP, Bootstrap per lo stile e un file `utenti.json` come archivio locale dei dati.

## 📦 Funzionalità principali

- ✅ Pagina di login con form centrato e stile Bootstrap
- ✅ Verifica delle credenziali tramite `GET` e confronto con `utenti.json`
- ✅ Pagina di registrazione con controllo di unicità del login
- ✅ Salvataggio dei nuovi utenti nel file JSON
- ✅ Messaggi di errore e conferma in stile visivo coerente

## 📁 Struttura dei file

- `login.php` — Form di accesso utente
- `controllo.php` — Verifica credenziali e visualizzazione dati
- `registrazione.php` — Form per creare un nuovo utente
- `salva_utente.php` — Salvataggio dei dati nel file JSON
- `utenti.json` — Archivio locale degli utenti registrati

## 📌 Formato del file `utenti.json`

```json
[
  {
    "login": "mrossi",
    "password": "pass1234",
    "nome": "Marco",
    "cognome": "Rossi",
    "email": "marco.rossi@example.com"
  }
]
