function calculate() {
    try {
        let data = document.getElementById('data');
        let time = 0;
        let cost = 0;
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
