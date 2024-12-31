fetch('get_data.php')
  .then((response) => response.json())
  .then((data) => {
    // Data untuk Volume Sampah Masuk
    const volumeLabels = data.volume_sampah.map((row) => row.kategori);
    const volumeData = data.volume_sampah.map((row) => row.total_volume);

    // Data untuk Sampah Terproses
    const prosesLabels = data.sampah_proses.map((row) => row.kategori);
    const prosesData = data.sampah_proses.map((row) => row.total_volume);

    // Data untuk Komposisi Sampah
    const komposisiLabels = data.komposisi_sampah.map((row) => row.kategori);
    const komposisiData = data.komposisi_sampah.map((row) => row.persentase);

    console.log(volumeLabels)
    console.log(volumeData)

    // Bar Chart untuk Volume Sampah
    const volumeChart = new Chart(document.getElementById("volumeChart"), {
      type: "bar",
      data: {
        labels: volumeLabels,
        datasets: [
          {
            label: "Volume Sampah Masuk (ton)",
            data: volumeData,
            backgroundColor: volumeLabels.map((_, index) => {
              const colors = ["#4caf50", "#2196f3", "#ff9800", "#e91e63", "#9c27b0"];
              return colors[index % colors.length]; // Gunakan warna berulang
            }),
            borderColor: volumeLabels.map((_, index) => {
              const colors = ["#388e3c", "#1976d2", "#f57c00", "#c2185b", "#7b1fa2"];
              return colors[index % colors.length]; // Gunakan warna border berulang
            }),
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true, // Tetap menampilkan legend
            position: "top", // Bisa disesuaikan dengan kebutuhan
          },
        },
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });

    // Bar Chart untuk Sampah Terproses
    const prosesChart = new Chart(document.getElementById("prosesChart"), {
      type: "bar",
      data: {
        labels: prosesLabels,
        datasets: [
          {
            label: "Sampah yang Terproses (ton)",
            data: prosesData,
            backgroundColor: prosesLabels.map((_, index) => {
              const colors = ["#673ab7", "#03a9f4", "#ff5722", "#ffc107", "#8bc34a"];
              return colors[index % colors.length];
            }),
            borderColor: prosesLabels.map((_, index) => {
              const colors = ["#5e35b1", "#0288d1", "#e64a19", "#ffa000", "#689f38"];
              return colors[index % colors.length];
            }),
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: "top",
          },
        },
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });

    // Pie Chart untuk Komposisi Sampah
    const komposisiChart = new Chart(document.getElementById("komposisiChart"), {
      type: "pie",
      data: {
        labels: komposisiLabels,
        datasets: [
          {
            data: komposisiData,
            backgroundColor: komposisiLabels.map((_, index) => {
              const colors = ["#ff6384", "#36a2eb", "#ffce56", "#4caf50", "#f44336"];
              return colors[index % colors.length];
            }),
            hoverBackgroundColor: komposisiLabels.map((_, index) => {
              const colors = ["#ff4365", "#1f8bec", "#e8b547", "#388e3c", "#d32f2f"];
              return colors[index % colors.length];
            }),
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            position: "top",
          },
        },
      },
    });
  })
  .catch((error) => console.error("Error fetching data:", error));
