var fs = require('fs');
function hide(a,b){
    var mass = [];
    var l = 0;
    for(var i in b){
        if(typeof b[i] == "number"){
            let name = {};
            name[i] = b[i];
            mass.push(name);
            l++;
        }
    }
    mass.sort((a, b) => Math.random() - 0.5);
    let Pokemon = mass[0];
    for(var j in Pokemon) {
        var name = j;
        var level = Pokemon[j];
    }
    fs.writeFile(`./${a}/pokemon.txt`, `${name}|${level}`, (err) => {
        if(err) return console.error(err);
        console.log(`Спрятан покемон: ${name}|${level} в папке ${a}`);
    });
}
module.exports = {
    hide
}