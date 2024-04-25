var bukuCount = 1; // - ID jumlah Buku
var selectedBukuIds = {}; // Value ID Buku

// Ambil Id button Tambah Buku "addBukuButton"
document.getElementById("addBukuButton").addEventListener("click", function () {
  bukuCount++;

  // Fungsi Tambah Select Option Baru
  var newSelect = document.createElement("select");
  newSelect.className = "form-control text-center"; // Class Select option
  newSelect.name = "buku_" + bukuCount;
  newSelect.id = "buku_" + bukuCount;

  // Fungsi Nambah/Copy Paste Pilihan Select Option
  var existingSelect = document.getElementById("buku");
  for (var i = 0; i < existingSelect.options.length; i++) {
    var option = existingSelect.options[i].cloneNode(true);
    newSelect.appendChild(option);
  }

  // Fungsi Nambah Label Form
  var newLabel = document.createElement("label");
  newLabel.setAttribute("for", "buku_" + bukuCount);
  newLabel.className = "form-label";
  newLabel.textContent = "Buku Pinjam";

  // Fungsi Nambah Div Baru
  var newDiv = document.createElement("div");
  newDiv.className = "col-md-6";
  newDiv.appendChild(newLabel);
  newDiv.appendChild(newSelect);

  // Fungsi Insert Select Option
  existingSelect.parentNode.parentNode.insertBefore(
    newDiv,
    existingSelect.parentNode.nextSibling
  );

  // - Fungsi iki sampe nisor copy paste google (Fungsine nyimpen array nilai ID Buku)
  newSelect.addEventListener("change", function () {
    var selectedBukuId = newSelect.value;
    selectedBukuIds[newSelect.id] = selectedBukuId;
    document.getElementById("selected_buku_ids").value =
      Object.values(selectedBukuIds).join(",");
  });
});

function bukuSelectChange(select) {
  var selectedBukuId = select.value;
  selectedBukuIds[select.id] = selectedBukuId;
  document.getElementById("selected_buku_ids").value =
    Object.values(selectedBukuIds).join(",");
}
