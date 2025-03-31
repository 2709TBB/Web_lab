const data = [
    { ho: "Nguyễn Văn", ten: "A", queQuan: "Hà Nội", trinhDo: "Đại học", heSoLuong: 3.5 },
    { ho: "Trần Thị", ten: "B", queQuan: "Sài Gòn", trinhDo: "Cao đẳng", heSoLuong: 2.8 },
    { ho: "Lê Văn", ten: "C", queQuan: "Đà Nẵng", trinhDo: "Trung cấp", heSoLuong: 2.2 },
];

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