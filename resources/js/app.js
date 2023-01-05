import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//prendiamo tutti i bottoni con la classe delete-btn
const deleteBtns = document.querySelectorAll(".delete-btn");

//per ognuno di questi bottoni assegniamo un evento click
deleteBtns.forEach((btn)=>{
    btn.addEventListener("click", (event) => {
        //prima di tutto impediamo l'attivarsi del form al click sul falso bottone delete(che invece dovrà aprire la finestra con il vero delete)
        event.preventDefault();
        //poi personalizziamo la finestra di conferma (in due passaggi, questo è il primo) con il titolo dell'elemento da cancellare (che apparirà nello span nel file delete-modal)
        const letterName = btn.getAttribute('data-letter-name');
        //con il click quindi creo il Modal di bootsrap che abbiamo inserito nella pagina delete-modal che avrà al suo interno il vero DELETE
        const modal = new bootstrap.Modal(
            document.getElementById("deleteModal")
        );
        //secondo e ultimo passaggio per personalizzare finestra di conferma cancellazione
        document.getElementById("modal-letter-name").innerText = letterName
        //infine assegniamo il vero submit di cancellazione al tasto di conferma
        document.getElementById("delete").addEventListener("click" , () => {
            btn.parentElement.submit();
        });
        modal.show()
    });
});


