document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('complaintForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this); 

        fetch('reports.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                form.reset(); 
                loadReports(); 
            } else {
                alert('Terjadi kesalahan: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Terjadi kesalahan:', error);
            alert('Terjadi kesalahan saat mengirim laporan!');
        });
    });

    function loadReports() {
        fetch('reports.php')
        .then(response => response.json())
        .then(data => {
            const reportList = document.getElementById('reportList');
            reportList.innerHTML = '';
            data.forEach(report => {
                const reportItem = document.createElement('div');
                reportItem.className = 'report-item';
                reportItem.innerHTML = `
                    <h4>${report.Judul}</h4>
                    <p>${report.Subject}</p>
                    <p>Status: ${report.status === 0 ? 'Pending' : 'Selesai'}</p>
                    <p>Waktu: ${report.Waktu}</p>
                `;
                reportList.appendChild(reportItem);
            });
        })
        .catch(error => {
            console.error('Terjadi kesalahan saat memuat laporan:', error);
        });
    }

    loadReports();
});
