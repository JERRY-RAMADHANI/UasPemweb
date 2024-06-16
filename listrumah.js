document.addEventListener('DOMContentLoaded', () => {
    const wargaList = [
        { nama: "Budi Santoso", alamat: "Jl. Merdeka No. 10", telepon: "08123456789" },
        { nama: "Siti Aminah", alamat: "Jl. Kemerdekaan No. 20", telepon: "08198765432" },
        { nama: "Ahmad Yani", alamat: "Jl. Pahlawan No. 5", telepon: "08111222333" },
        { nama: "Sri Wahyuni", alamat: "Jl. Kartini No. 12", telepon: "08122334455" },
        { nama: "Rudi Hartono", alamat: "Jl. Diponegoro No. 8", telepon: "08133445566" },
        { nama: "Aulia Rosadi", alamat: "Jl. Rungkut No. 35", telepon: "082134785309"},
        { nama: "Khaela Alifia Salsabilla", alamat: "Jl. Edelweis No. 57", telepon: "082120066438"}
    ];

    const wargaContainer = document.getElementById('wargaList');

    wargaList.forEach(warga => {
        const wargaDiv = document.createElement('div');
        wargaDiv.classList.add('warga');

        const summaryDiv = document.createElement('div');
        summaryDiv.textContent = warga.nama;
        wargaDiv.appendChild(summaryDiv);

        const detailsDiv = document.createElement('div');
        detailsDiv.classList.add('details');
        detailsDiv.innerHTML = `
            <p><strong>Alamat:</strong> ${warga.alamat}</p>
            <p><strong>No. Telepon:</strong> ${warga.telepon}</p>
        `;
        wargaDiv.appendChild(detailsDiv);

        wargaDiv.addEventListener('click', () => {
            wargaDiv.classList.toggle('active');
        });

        wargaContainer.appendChild(wargaDiv);
    });
});