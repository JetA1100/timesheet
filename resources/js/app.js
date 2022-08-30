function insertRow() {
    var row = document.getElementById('insert').getElementsByTagName('tr');
    var clone = row[row.length - 1].cloneNode(true);
    var data = document.getElementById('data');
    data.appendChild(clone);
    clearInput();
    setUpData();

}

function deleteRow() {
    try {
        var data = document.getElementById('data');
        for (var i = 0; i < data.rows.length; i++) {
            var row = data.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if (chkbox.checked) {
                document.getElementById("timesheet").deleteRow(i+1);
                i--;
            }
        }
    } catch(e) {
        alert(e);
    }
}

function setUpData() {
    $('#data td input, #data td textarea').prop('readonly', true);
    $('#data th').each(function (i) {
        var $td = $(this);
        $td.html('<input class="select" type="checkbox" onclick="fixGrammar()">');
    });
}

function fixGrammar() {
    var count = document.querySelectorAll('input[type="checkbox"]:checked').length;
    if (count < 2) {
        document.getElementById('deleteBtn').textContent = "Delete Entry";
    } else {
        document.getElementById("deleteBtn").textContent = "Delete Entries";
    }
}

function clearInput() {
    $('#insert td input, #insert td textarea').val(null);
}

$('#timesheet-entry').submit(function(e) {
    e.preventDefault();
    insertRow();
})

$('#deleteBtn').click(function() {
    deleteRow();
})

// $('.select').click(function() {
//     var count = document.querySelectorAll('input[type="checkbox"]:checked').length;
//     window.alert(count);
// })