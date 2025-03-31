function renderTable() {
    const tableBody = document.getElementById("data-table");
    tableBody.innerHTML = "";
    data.forEach((item, index) => {
        const row = document.createElement("tr");
        row.setAttribute("id", `row-${index}`); 
        row.innerHTML = `
            <td><button class="btn btn-danger btn-sm" onclick="deleteRow(${index})">Xóa</button></td>
            <td>${index + 1}</td>
            <td>${item.ho}</td>
            <td>${item.ten}</td>
            <td>${item.queQuan}</td>
            <td>${item.trinhDo}</td>
            <td>${item.heSoLuong}</td>
        `;
        tableBody.appendChild(row);
    });
}

function deleteRow(index) {
    const row = document.getElementById(`row-${index}`); 
    if (row) {
        row.remove(); 
    }
}

document.addEventListener("DOMContentLoaded", function () {
    renderTable();
});