<!DOCTYPE html>
<html>
<head>
  <title>Kontrol Lampu</title>
</head>
<body>

<h2>Kontrol Lampu</h2>

<button onclick="setRelay(0)">ON</button>
<button onclick="setRelay(1)">OFF</button>

<script>
function setRelay(val){
  fetch('/api/relay/' + val, {method:'POST'})
}
</script>

</body>
</html>