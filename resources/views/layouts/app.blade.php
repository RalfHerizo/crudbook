<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <section class="">
        @yield('content')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', ()=>{
                const editButtons = document.querySelectorAll('.edit-book-button');
                const readButtons = document.querySelectorAll('.read-book-button');
                const deleteButtons = document.querySelectorAll('.delete-book-button');
                const confirmDeleteButton = document.getElementById('confirm-delete-button');

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

                        const deleteUrl = `${window.location.origin}/delete-book/${id}`;
                        confirmDeleteButton.setAttribute('href', deleteUrl);
                        
                        console.log('Deleted URL : ' ,deleteUrl);                      

                        
                    });
                });
            })
        </script>
</body>

</html>
