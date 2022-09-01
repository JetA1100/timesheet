function insertRow() {
    let row = document.getElementById('insert').getElementsByTagName('tr');
    let clone = row[row.length - 1].cloneNode(true);
    let data = document.getElementById('data');
    data.appendChild(clone);
    clearInput();
    setUpData();

}

function deleteRow() {
    try {
        let data = document.getElementById('data');
        for (let i = 0; i < data.rows.length; i++) {
            let row = data.rows[i];
            let chkbox = row.cells[0].childNodes[0];
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
        let $td = $(this);
        $td.html('<input class="select" type="checkbox" onclick="fixGrammar()">');
    });
}

function calculate() {
    try {
        let data = document.getElementById('data');
        let time = 0;
        let cost = 0;
        for (let i = 0; i < data.rows.length; i++) {
            let row = data.rows[i];
            let curTime = row.cells[3].children[0].value;
            let curRate = row.cells[4].children[0].value;
            time += parseInt(curTime);
            cost += (parseInt(curTime) * parseInt(curRate));
        }
        document.querySelector('#time').textContent = time;
        document.querySelector('#cost').textContent = cost;
    } catch(e) {
        alert(e);
    }
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
    //insertRow();
    calculate();
    //e.preventDefault();
})

$('#deleteBtn').click(function() {
    deleteRow();
    handleSubmit();
    calculate();
})