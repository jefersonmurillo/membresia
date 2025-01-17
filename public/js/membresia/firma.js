let limpiar = document.getElementById("limpiar");
let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
let cw = canvas.width = 600,
    cx = cw / 2;
let ch = canvas.height = 200,
    cy = ch / 2;

let dibujar = false;
let factorDeAlisamiento = 5;
let Trazados = [];
let puntos = [];

ctx.lineJoin = "round";

limpiar.addEventListener('click', function(evt) {
    dibujar = false;
    ctx.clearRect(0, 0, cw, ch);
    Trazados.length = 0;
    puntos.length = 0;
    console.log(canvas.toDataURL());
}, false);


canvas.addEventListener('mousedown', function(evt) {
    dibujar = true;
    //ctx.clearRect(0, 0, cw, ch);
    puntos.length = 0;
    ctx.beginPath();

}, false);

canvas.addEventListener('mouseup', function(evt) {
    redibujarTrazados();
}, false);

canvas.addEventListener("mouseout", function(evt) {
    redibujarTrazados();
}, false);

canvas.addEventListener("mousemove", function(evt) {
    if (dibujar) {
        var m = oMousePos(canvas, evt);
        puntos.push(m);
        ctx.lineTo(m.x, m.y);
        ctx.stroke();
    }
}, false);

function reducirArray(n,elArray) {
    var nuevoArray = [];
    nuevoArray[0] = elArray[0];
    for (var i = 0; i < elArray.length; i++) {
        if (i % n == 0) {
            nuevoArray[nuevoArray.length] = elArray[i];
        }
    }
    nuevoArray[nuevoArray.length - 1] = elArray[elArray.length - 1];
    Trazados.push(nuevoArray);
}

function calcularPuntoDeControl(ry, a, b) {
    var pc = {}
    pc.x = (ry[a].x + ry[b].x) / 2;
    pc.y = (ry[a].y + ry[b].y) / 2;
    return pc;
}

function alisarTrazado(ry) {
    if (ry.length > 1) {
        var ultimoPunto = ry.length - 1;
        ctx.beginPath();
        ctx.moveTo(ry[0].x, ry[0].y);
        for (i = 1; i < ry.length - 2; i++) {
            var pc = calcularPuntoDeControl(ry, i, i + 1);
            ctx.quadraticCurveTo(ry[i].x, ry[i].y, pc.x, pc.y);
        }
        ctx.quadraticCurveTo(ry[ultimoPunto - 1].x, ry[ultimoPunto - 1].y, ry[ultimoPunto].x, ry[ultimoPunto].y);
        ctx.stroke();
        $('#firma-data').val(canvas.toDataURL("image/png"));
    }
}


function redibujarTrazados(){
    dibujar = false;
    ctx.clearRect(0, 0, cw, ch);
    reducirArray(factorDeAlisamiento,puntos);
    for(var i = 0; i < Trazados.length; i++)
        alisarTrazado(Trazados[i]);
}

function oMousePos(canvas, evt) {
    var ClientRect = canvas.getBoundingClientRect();
    return { //objeto
        x: Math.round(evt.clientX - ClientRect.left),
        y: Math.round(evt.clientY - ClientRect.top)
    }
}
