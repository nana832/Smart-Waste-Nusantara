document.addEventListener("DOMContentLoaded", () => {
    fetch('get_penjemputan.php') // Ganti dengan URL API Anda
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('#jadwal-table tbody');
            tbody.innerHTML = ""; // Kosongkan tabel sebelum mengisi data
            
            data.forEach(item => {
                const row = document.createElement('tr');
                
                row.innerHTML = `
                    <td>${item.hari}</td>
                    <td>${item.waktu}</td>
                    <td>${item.lokasi_pengangkutan}</td>
                    <td><a href="https://www.google.com/maps?q=${item.lokasi_terkini_lat},${item.lokasi_terkini_lng}" target="_blank">Lihat Lokasi</a></td>
                `;
                
                tbody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
