<!DOCTYPE html>
<html>
<head>
    <title>Smart Lamp Control</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            font-family: Arial;
            text-align: center;
            background: #0f172a;
            color: white;
            margin-top: 50px;
        }

        .card {
            background: #1e293b;
            padding: 30px;
            border-radius: 15px;
            display: inline-block;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        button {
            padding: 15px 30px;
            font-size: 18px;
            margin: 10px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
        }

        .on { background: #22c55e; color: white; }
        .off { background: #ef4444; color: white; }

        h1 { margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="card">
    <h1>💡 Smart Lamp</h1>
    <h3>Status: <span id="status">Loading...</span></h3>

    <button class="on" onclick="setRelay(1)">ON</button>
    <button class="off" onclick="setRelay(0)">OFF</button>
</div>

<script>
function getStatus(){
    fetch('/api/relay')
    .then(res => res.json())
    .then(data => {
        document.getElementById('status').innerText =
            data.status == 1 ? "NYALA" : "MATI";
    });
}

function setRelay(val){
    fetch('/api/relay/' + val, {method:'POST'})
    .then(() => getStatus());
}

// refresh tiap 2 detik
setInterval(getStatus, 2000);

// load pertama
getStatus();
</script>

</body>
</html>