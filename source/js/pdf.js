
document.getElementById('appointmentForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var formData = new FormData(this);

    fetch('source/frontend/book_appointments.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.blob(); 
        } else {
            throw new Error('Network response was not ok.');
        }
    })
    .then(blob => {
        var url = window.URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = 'appointment_details.pdf'; 
        document.body.appendChild(a);
        a.click(); 
        a.remove(); 
        window.URL.revokeObjectURL(url); 
        document.getElementById('responseMessage').style.display = 'block';
        document.getElementById('responseMessage').textContent = "Your appointment has been successfully made. The PDF is being downloaded.";
        this.reset(); 
    })
    .catch(error => {
        console.error('Error:', error);
    });
});