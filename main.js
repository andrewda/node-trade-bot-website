var socket = io();

socket.on('donation', function(data) {
    document.getElementById('donations').innerHTML += data.steamid + ": Donated " + data.items + " items <br>";
});