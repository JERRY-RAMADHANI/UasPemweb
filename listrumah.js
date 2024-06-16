document.addEventListener('DOMContentLoaded', function() {
    fetch('listrumah.php')
        .then(response => response.json())
        .then(data => {
            const wargaList = document.getElementById('wargaList');
            if (data.length > 0) {
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.className = 'warga';
                    div.innerHTML = `
                        <h3>${item.Kepala_Keluarga}</h3>
                        <div class="details">
                            <p>Alamat: ${item.Alamat}</p>
                            <p>Nomor Telepon: ${item.No_Telp}</p>
                        </div>
                    `;
                    div.addEventListener('click', function() {
                        this.classList.toggle('active');
                    });
                    wargaList.appendChild(div);
                });
            } else {
                wargaList.innerHTML = '<p>Data tidak ditemukan</p>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            wargaList.innerHTML = '<p>Gagal memuat data</p>';
        });
});
