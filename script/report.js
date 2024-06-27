// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// Check if modal data is present in URL
window.onload = function () {
  const urlParams = new URLSearchParams(window.location.search);
  const nama = urlParams.get("nama");
  const tanggal = urlParams.get("tanggal");
  const status = urlParams.get("status");
  const kode = urlParams.get("kode");

  if (nama && tanggal && status && kode) {
    document.getElementById("modal-content").innerHTML = `
            <strong>Nama:</strong> ${nama}<br>
            <strong>Tanggal:</strong> ${tanggal}<br>
            <strong>Status:</strong> ${status}<br>
            <strong>Kode Unik:</strong> ${kode}
        `;
    modal.style.display = "block";
  }
};
