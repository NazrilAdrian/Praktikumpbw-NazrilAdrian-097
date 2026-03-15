function cekNilai() {
    const nim = document.getElementById('nim').value;
    const nilaiInput = document.getElementById('nilai').value;
    const hasilDiv = document.getElementById('hasil');

    hasilDiv.style.display = 'block';
    hasilDiv.className = 'result'; 

    if (nim.trim() === "" || nilaiInput.trim() === "") {
        hasilDiv.classList.add('error');
        hasilDiv.innerHTML = "Error: Kolom NIM dan Nilai harus diisi!";
        return;
    }

    const nilai = parseFloat(nilaiInput);

    if (nilai < 0 || nilai > 100) {
        hasilDiv.classList.add('error');
        hasilDiv.innerHTML = "Error: Nilai tidak valid! Masukkan rentang antara 0 hingga 100.";
    } else {
        let hurufMutu = "";
        
        if (nilai >= 80 && nilai <= 100) {
            hurufMutu = "A";
        } else if (nilai >= 70 && nilai < 80) {
            hurufMutu = "B";
        } else if (nilai >= 60 && nilai < 70) {
            hurufMutu = "C";
        } else if (nilai >= 50 && nilai < 60) {
            hurufMutu = "D";
        } else if (nilai >= 0 && nilai < 50) {
            hurufMutu = "E";
        }

        hasilDiv.classList.add('success');
        hasilDiv.innerHTML = `NIM: ${nim} <br> Nilai Angka: ${nilai} <br> Huruf Mutu: <strong>${hurufMutu}</strong>`;
    }
}