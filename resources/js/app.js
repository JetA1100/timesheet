function calculate() {
    try {
        let data = document.getElementById('data');
        let insert = document.getElementById('insert');
        let insTime = insert.rows[0].cells[2].children[0].value;
        let insRate = insert.rows[0].cells[3].children[0].value;
        let time = 0 + parseInt(insTime);
        let cost = 0 + (parseInt(insTime) * parseInt(insRate));
        for (let i = 0; i < data.rows.length; i++) {
            let row = data.rows[i];
            let curTime = row.cells[2].children[0].value;
            let curRate = row.cells[3].children[0].value;
            time += parseInt(curTime);
            cost += (parseInt(curTime) * parseInt(curRate));
        }
        document.querySelector('#time').textContent = time;
        document.querySelector('#cost').textContent = cost;
    } catch(e) {
        alert(e);
    }
}