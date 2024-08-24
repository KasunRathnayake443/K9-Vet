document.querySelectorAll('.show-more').forEach(button => {
    button.addEventListener('click', function() {
        const parent = button.closest('.service-item');
        const shortDescription = parent.querySelector('.short-description');
        const fullDescription = parent.querySelector('.full-description');

        if (shortDescription.classList.contains('d-none')) {
            shortDescription.classList.remove('d-none');
            fullDescription.classList.add('d-none');
            button.innerHTML = '<i class="fa fa-plus text-primary me-3"></i>Read More';
        } else {
            shortDescription.classList.add('d-none');
            fullDescription.classList.remove('d-none');
            button.innerHTML = '<i class="fa fa-minus text-primary me-3"></i>Show Less';
        }
    });
});