import './bootstrap';
document.addEventListener('DOMContentLoaded', ()=>{
    const editButtons = document.querySelectorAll('.edit-book-button');
    const readButtons = document.querySelectorAll('.read-book-button');
    const deleteButtons = document.querySelectorAll('.delete-book-button');
    const confirmDeleteForm = document.getElementById('confirm-delete-form');

    const modal = document.getElementById('updateProductModal');
    const form = modal.querySelector('form');
    const actionUrl = form.action;
    
    editButtons.forEach(button => {
        button.addEventListener('click',()=>{
            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const author = button.getAttribute('data-author');
            const description = button.getAttribute('data-description');
            
            document.getElementById('data-title-edit-modal-book').value = title;
            document.getElementById('data-title-author-modal-book').value = author;
            document.getElementById('data-title-description-modal-book').value = description;
            
            const updateBookUrl = `${window.location.origin}/update-book/${id}`;
            form.setAttribute('action', updateBookUrl);

            console.log("Updated URL: ",updateBookUrl);
        });
    });

    readButtons.forEach(button => {
        button.addEventListener('click',()=>{
            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const author = button.getAttribute('data-author');
            const description = button.getAttribute('data-description');
            
            document.getElementById('read-modal-book-title').innerHTML = title;
            document.getElementById('read-modal-book-author').innerHTML = author;
            document.getElementById('read-modal-book-description').innerHTML = description;
        });
    });

    deleteButtons.forEach( button => {
        button.addEventListener('click',()=>{
            const id = button.getAttribute('data-id');

            if(id != null){
                const deleteUrl = `${window.location.origin}/delete-book/${id}`;
                confirmDeleteForm.setAttribute('action', deleteUrl);
                console.log('Deleted URL : ' ,deleteUrl);                      
            } else {
                confirmDeleteForm.setAttribute('action', `${window.location.origin}/books/delete/`);
            }
            

            
        });
    });
})