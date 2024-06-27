document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("desc-modal");
    const modalContent = document.getElementById("modal-body");
    const span = document.getElementsByClassName("close")[0];
    let currentCaseId;

    span.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

    document.querySelectorAll(".btn-desc").forEach((button) => {
        button.addEventListener("click", function () {
            currentCaseId = this.dataset.id;
            fetch(`get_case.php?id=${currentCaseId}`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.error) {
                        modalContent.innerHTML = `<p>${data.error}</p>`;
                    } else {
                        modalContent.innerHTML = `
                            <p><strong>Nama Lengkap:</strong> ${
                                data.nama_lengkap
                            }</p>
                            <p><strong>Alamat:</strong> ${data.alamat}</p>
                            <p><strong>Jenis Identitas:</strong> ${
                                data.jenis_identitas
                            }</p>
                            <p><strong>No HP:</strong> ${data.no_hp}</p>
                            <p><strong>Nomor Identitas:</strong> ${
                                data.nomor_identitas
                            }</p>
                            <p><strong>Email:</strong> ${data.email}</p
                            <p><strong>Status Pelapor:</strong> ${
                                data.status_pelapor
                            }</p>
                            <p><strong>Kategori:</strong> ${data.kategori}</p>
                            <p><strong>Nama Terlapor:</strong> ${
                                data.nama_terlapor
                            }</p>
                            <p><strong>Status Terlapor:</strong> ${
                                data.status_terlapor
                            }</p>
                            <p><strong>No HP Terlapor:</strong> ${
                                data.no_hp_terlapor
                            }</p>
                            <p><strong>Email Terlapor:</strong> ${
                                data.email_terlapor
                            }</p>
                            <p><strong>Tanggal Peristiwa:</strong> ${
                                data.tanggal_peristiwa
                            }</p>
                            <p><strong>Lokasi Peristiwa:</strong> ${
                                data.lokasi_peristiwa
                            }</p>
                            <p><strong>Kronologi Peristiwa:</strong> ${
                                data.kronologi_peristiwa
                            }</p>
                            <p><strong>Status:</strong> ${
                                statusMap[data.status]
                            }</p>
                        `;
                        modal.style.display = "block";
                    }
                })
                .catch((error) => console.error("Error:", error));
        });
    });

    document.querySelectorAll(".status-select").forEach((select) => {
        select.addEventListener("change", function () {
            const newStatus = this.value;
            const caseId = this.dataset.id;

            fetch("update_status.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ id: caseId, status: newStatus }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        const statusText = statusMap[newStatus];
                        const statusCell = this.closest("tr").querySelector(
                            ".status"
                        );
                        statusCell.textContent = statusText;
                        statusCell.className = `status ${statusText.toLowerCase()}`;
                        sendStatusEmail(caseId, newStatus); // Kirim email setiap kali status diubah
                    } else {
                        console.error("Failed to update status:", data.message);
                    }
                })
                .catch((error) => console.error("Error:", error));
        });
    });

    const statusMap = {
        1: "Process",
        2: "Checking",
        3: "Discussion",
        4: "Finish",
    };

    function sendStatusEmail(caseId, newStatus) {
        fetch("send_email.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id: caseId, status: newStatus }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (!data.success) {
                    console.error("Failed to send email:", data.message);
                }
            })
            .catch((error) => console.error("Error:", error));
    }
});
