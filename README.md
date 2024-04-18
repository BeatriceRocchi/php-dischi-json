# PHP Dischi JSON

Creare una web-app che permetta di leggere una lista di dischi presente nel nostro server. Al click su un disco, recuperare e mostrare i dati del disco selezionato.

## Svolgimento

1. Creare un layout di base in html e css.
2. Creare un file js che farà la chiamata ad un server esterno (apiUrl=server.php).
3. Creare un file server.php che a sua volta prende i dati dal json.
4. Popolare un file json che conterrà i dati.
5. Creazione nuovo disco:
   - Creare un'area per l'inserimento di un nuovo disco formata da campi di input e un button per inviare i dati.
   - Inizializzare un oggetto newDisk in script.js che sarà popolato con i dati inseriti nei campi di input tramite un v-model.
   - al click sul button al termine dell'area di inserimento, richiamare la funzione addNewDisk() che strutturerà i dati, invierà con axios i dati in post e poi aggiornerà l'elenco di dischi
   - in server.php gestire logica di aggiunta del disco nella lista, creando un nuovo album da aggiungere.
